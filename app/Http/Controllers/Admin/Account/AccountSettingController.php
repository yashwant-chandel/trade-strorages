<?php

namespace App\Http\Controllers\Admin\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Hash;
use App\Models\Address;
use App\Models\SiteMeta;

class AccountSettingController extends Controller
{
   public function index(){
       
        $address = Address::find(Auth::user()->address);
        $site_meta = SiteMeta::all();
        return view('Admin.account.setting',compact('address','site_meta'));
   }
   public function updateProfile(Request $request){
    // echo '<pre>';
    // print_r($request->all());
    // echo '</pre>';
    // die();
    if($request->action == 'personal_detail'){
        $request->validate([
            'full_name' => 'required',
            'email' => 'required',
        ]);
    
        $user = User::find(Auth::user()->id);
        $user->name = $request->full_name;
        $user->email = $request->email;
        $user->phone = $request->phone;

        if($request->old_password){
            $request->validate([
                'password' => 'required|min:6',
                'confirm_password' => 'required_with:password|same:password|min:6'
            ]);
            if (Hash::check($request->old_password, $user->password)) {
                $user->password = $request->password;
            }else{
                $user->update();
                return redirect()->back()->with('error','Older password that you entered is wrong');
            }
        }
        $user->update();
    }elseif($request->action == 'address'){
        $request->validate([
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'pincode' => 'required',
        ]);
        if(Auth::user()->address){
            $address = Address::find(Auth::user()->address);
            $address->address = $request->address;
            $address->city = $request->city;
            $address->state = $request->state;
            $address->pincode = $request->pincode;
            $address->update();
        }else{
            $address = new Address;
            $address->address = $request->address;
            $address->city = $request->city;
            $address->state = $request->state;
            $address->pincode = $request->pincode;
            $address->save();
            $user = User::find(Auth::user()->id);
            $user->address = $address->id;
            $user->update();
        }
    }elseif($request->action = 'links'){
        $site_meta = SiteMeta::all();
        foreach($site_meta as $metas){
            // if($request[$metas->key]){
               $add_meta = SiteMeta::find($metas->id);
               $add_meta->value = $request[$metas->key];
               $add_meta->update();
            // }
        }
    }
    // die();
        return redirect()->back()->with('success','Successfully updated');
   }
}
