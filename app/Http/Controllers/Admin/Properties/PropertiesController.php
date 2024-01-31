<?php

namespace App\Http\Controllers\Admin\Properties;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Propertie;
use App\Models\Media;
use App\Models\Address;
use App\Models\Category;
use App\Models\Sizes;
use App\Models\Feature;
use App\Models\Storage;
use File;
use Stripe\Stripe;
use Stripe\Price;


class PropertiesController extends Controller
{
    public function index(){
        return view('Admin.properties.addproperty');
    }
    public function edit($id){
        $propertie = Propertie::find($id);
        return view('Admin.properties.editproperty',compact('propertie'));
    }
    public function submitProcc(Request $request){
        $request->validate([
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'pincode' => 'required',
            'url' => 'required',
            'featured_image' => 'required',
            'gallery_images' => 'required',
        ]);
        // echo '<pre>';
        // print_r($request->all());
        // echo '</pre>';
        // die();

        $address = new Address;
        $address->address = $request->address;
        $address->city = $request->city;
        $address->state = $request->state;
        $address->pincode = $request->pincode;
        $address->status = 1;
        $address->save();

        $external_features = [];
            for($i = 0; $i < count($request->title); $i++){
                $data = [$request->title[$i] => $request->description[$i]];
                array_push($external_features,$data);
            }
        $facility_features = [];
            for($x=0; $x < count($request->icon); $x++){
                $data1 = [$request->icon[$x] => $request->facility_feature[$x]];
                array_push($facility_features,$data1);
            }
        $stripe = new \Stripe\StripeClient( env('STRIPE_SECRET_KEY') );
        // Create product //////////////////////////////////
        $product_name_stripe = $request->address.'-'.$request->city.'-'.$request->state.'-'.$request->pincode;
        $productstripe = $stripe->products->create([
            'name' => $product_name_stripe,
            'description' => '<></>',
        ]);
        $propertie = new Propertie;
        $propertie->stripe_product_id = $productstripe->id;
        $propertie->address_id = $address->id;
        $propertie->map_url = $request->url;
        $propertie->external_option = json_encode($external_features);
        $propertie->storage_facility_features = json_encode($facility_features);
        $propertie->status = 1;
        $propertie->save();

        if($request->hasFile('featured_image')){
            $file = $request->file('featured_image');
            $name = 'Img'.time().rand(1,100).'.'.$file->extension();
            $file->move(public_path('property_images'),$name);
            $media = new Media;
            $media->image_name = $name;
            $media->image_path = 'property_images/'.$name;
            $media->featured_image = 1;
            $media->property_id = $propertie->id;
            $media->status = 1;
            $media->save();
        }
        if($request->hasFile('gallery_images')){
            foreach($request->file('gallery_images') as $file){
                $name = 'Img'.time().rand(1,100).'.'.$file->extension();
                $file->move(public_path('property_images'),$name);

                $media = new Media;
                $media->image_name = $name;
                $media->image_path = 'property_images/'.$name;
                $media->featured_image = 0;
                $media->property_id = $propertie->id;
                $media->status = 1;
                $media->save();
            }
        }
        return redirect()->back()->with('success','Successfully saved new propertie');

    }
    public function updateProcc(Request $request){
        // echo '<pre>';
        // print_r($request->all());
        // echo '</pre>';
        // die();
        
        $propertie = Propertie::find($request->id);
      
        $address = Address::find($propertie->address_id);
        $address->address = $request->address;
        $address->city = $request->city;
        $address->state = $request->state;
        $address->pincode = $request->pincode;
        $address->update();

        $external_features = [];
        if($request->title){
            for($i = 0; $i < count($request->title); $i++){
                $data = [$request->title[$i] => $request->description[$i]];
                array_push($external_features,$data);
            }
        }
        $facility_features = [];
        if($request->icon){
            for($x=0; $x < count($request->icon); $x++){
                $data1 = [$request->icon[$x] => $request->facility_feature[$x]];
                array_push($facility_features,$data1);
            }
        }
        $propertie->map_url = $request->url;
        $propertie->storage_facility_features = json_encode($facility_features);
        $propertie->external_option = json_encode($external_features);
        $propertie->update();

        if($request->hasFile('featured_image')){
            $file = $request->file('featured_image');
            $name = 'Img'.time().rand(1,100).'.'.$file->extension();
            $file->move(public_path('property_images'),$name);
            $media = Media::where([['property_id',$propertie->id],['featured_image',1]])->first();
            $media->image_name = $name;
            $media->image_path = 'property_images/'.$name;
            $media->featured_image = 1;
            $media->property_id = $propertie->id;
            $media->status = 1;
            $media->update();
        }
        if($request->hasFile('gallery_images')){
            foreach($request->file('gallery_images') as $file){
                $name = 'Img'.time().rand(1,100).'.'.$file->extension();
                $file->move(public_path('property_images'),$name);

                $media = new Media;
                $media->image_name = $name;
                $media->image_path = 'property_images/'.$name;
                $media->featured_image = 0;
                $media->property_id = $propertie->id;
                $media->status = 1;
                $media->save();
            }
        }
        return redirect()->back()->with('success','Successfully updated property');
    }
    public function list(){
        $properties = Propertie::all();

        return view('Admin.properties.propertylist',compact('properties'));
    }
    
    public function view($id){
            
        $propertie_data = Propertie::find($id);
        $categories = Category::all();
        
        return view('Admin.properties.propertyview',compact('propertie_data','categories'));
    }
    public function delete($id){

        $propertie = Propertie::find($id);
        if(!$propertie){
            abort(404);
        }
        $address = Address::find($propertie->address_id);
        $address->delete();

        $media = Media::where('property_id',$propertie->id)->get();
        foreach($media as $m){
            $image = Media::find($m->id);
            $path = public_path($m->image_path);
            if(File::exists($path)){
                File::delete($path);
            }
        }
        $propertie->delete();
        return redirect()->back()->with('success','Successfully deleted properties');
    }
    public function getSizesAndFeatures(Request $request){

        $sizes = Sizes::where('category_id',$request->category_id)->get();
        $features = Feature::where('category_id',$request->category_id)->get();
        return [$sizes,$features];
    }
    public function storageSubmit(Request $request){
      
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'sizes' => 'required',
            'features'=> 'required',
            'regular_price' => 'required',
            'discount_price' => 'required'
        ]);
        $property = Propertie::find($request->propertie_id);


        $storage = new Storage;
        $storage->title = $request->title;
        $storage->category_id = $request->category;
        $storage->size_id = $request->sizes;
        $storage->features = json_encode($request->features);
        $storage->regular_price = $request->regular_price;
        $storage->discount_price = $request->discount_price;
        $storage->propertie_id = $request->propertie_id;

        $stripe = new \Stripe\StripeClient( env('STRIPE_SECRET_KEY') );
        $price = $stripe->prices->create(
            [
            'product' => $property->stripe_product_id,
            'unit_amount' => $request->discount_price * 100,
            'currency' => 'USD',
            'recurring' => [
                'interval' => 'month', // product price charge interval 
            ],
            ]
        );
        $storage->stripe_price_id = $price->id;
        $storage->save();
        return redirect()->back()->with('success','Successfully saved storage');

    }
    public function storageUpdate(Request $request){
        
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'sizes' => 'required',
            'features' => 'required',
            'regular_price' => 'required',
            'discount_price' => ' required',
        ]);
        $storage = Storage::find($request->id);
        $propertie = Propertie::find($storage->propertie_id);
        $stripe = new \Stripe\StripeClient( env('STRIPE_SECRET_KEY') );
        $storage->title = $request->title;
        $storage->category_id = $request->category;
        $storage->size_id = $request->sizes;
        $storage->features = json_encode($request->features);
        $storage->regular_price = $request->regular_price;
        if($storage->discount_price !== $request->discount_price){
            $price =  $stripe->prices->update($storage->stripe_price_id, ['active' => false]);
            $newprice = $stripe->prices->create(
                [
                'product' => $propertie->stripe_product_id,
                'unit_amount' => $request->discount_price * 100,
                'currency' => 'USD',
                'recurring' => [
                    'interval' => 'month', // product price charge interval 
                ],
                ]
            );
            $storage->discount_price = $request->discount_price;
            $storage->stripe_price_id = $newprice->id;

        }
        $storage->update();
        return redirect()->back()->with('success','Successfully updated your storage');

    }
    public function storageDelete($id){
        $storage = Storage::find($id);
        if(!$storage){
            abort(404);
        }
        $stripe = new \Stripe\StripeClient( env('STRIPE_SECRET_KEY') );
        $price =  $stripe->prices->update($storage->stripe_price_id, ['active' => false]);
        $storage->delete();
        return redirect()->back()->with('success','successfully deleted data');
    }
    public function updateStorage($id){
        $storage = Storage::find($id);
        $categories = Category::all();
        $sizes = Sizes::where('category_id',$storage->category_id)->get();
        $features = Feature::where('category_id',$storage->category_id)->get();
     
        if(!$storage){
            abort(404);
        }

        return view('Admin.properties.updatestorages',compact('categories','storage','sizes','features'));
    }
    public function deleteImages(Request $request){
        $media = Media::find($request->id);
        $path = public_path($media->image_path);
        
        if(File::exists($path)){
            File::delete($path);
        }
        $media->delete();
        return response()->json(['success','Successfully deleted']);
    }
}
