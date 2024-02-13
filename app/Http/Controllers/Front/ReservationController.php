<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Propertie;
use App\Models\Storage;
use App\Models\Address;
use App\Models\Sizes;
use App\Models\SiteFeature;
use App\Models\Feature;
use App\Models\User;
use Hash;

class ReservationController extends Controller
{
    public function index(){
        $stripe = new \Stripe\StripeClient( env('STRIPE_SECRET_KEY') );
        #################### Create setupintent ##########################
        $intent =  $stripe->setupIntents->create([
            'payment_method_types' => ['card'],
          ]);
        return view('Front.reservation.reservation',compact('intent'));
    }
    public function confirmation(){
        return view('Front.reservation.confirmation');
    }
    public function getStorageData(Request $request){
       $storage = Storage::where([['id',$request->id],['status',1]])->with('propertie',function($query){ $query->with('address'); })->with('size')->first();
       if(!$storage){
        return response()->json(['error'=>'Sorry,this storage is already reserved']);
       }
       return response()->json(['success'=>$storage]);
    }
    public function paymentProcc(Request $request){
        echo '<pre>';
        print_r($request->all());
        echo '</pre>';
        
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'move_in_date' => 'required',
            'region' => 'required',
            'state' => 'required',
            'city' => 'required',
            'address_1' => 'required',
            'address_2' => 'required',
            'card_name' => 'required',
            'zipcode' => 'required',
        ]);
        $storage = Storage::where([['id',$request->storage_id],['status',1]])->first();
        if(!$storage){
            echo 'this storage is not available';
        }
        $address = new Address;
        $address->address = $request->address_1;
        $address->address2 = $request->address_2;
        $address->city = $request->city;
        $address->state = $request->state;
        $address->pincode = $request->zipcodes;
        $address->country = $request->region;
        $address->pincode = $request->zipcode;
        $address->full_address = $request->address_1.','.$request->city.','.$request->state.' '.$request->zipcode;
        $address->status = 1;
        $address->save();

        $user = new User;
        $user->name = $request->first_name.' '.$request->last_name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $password = Hash::make($request->password);
        $user->password = $password;
        $user->is_admin = 0;
        $user->status = 0;
        $user->save();

        ////create customer stripe

        $stripe = new \Stripe\StripeClient( env('STRIPE_SECRET_KEY') );
        $customer =  $stripe->customers->create([
            'name' => $user->name,
            'email' => $user->email,
            'payment_method' => $request->token,
            'invoice_settings' => [
            'default_payment_method' => $request->token,
            ],
            'address' => [
            'line1' => $address->address,
            'postal_code' => $address->zipcode,
            'city' => $address->city,
            'state' => $address->state,
            'country' => $address->country,
            ],
        ]);
        $createMembership =  $stripe->subscriptions->create([
            'customer' => $customer->id,
            'collection_method'=>'charge_automatically',
            'items' =>[
               [ 'price' => $storage->stripe_price_id,
              ]
            ],
         ]);
         dd($createMembership);
die();
    }
}
