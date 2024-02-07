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

class StorageSearchController extends Controller
{
    public function index(Request $request){

        $site_features = SiteFeature::all();
    
        
        if($request->location){
            $location = $request->location;
            // $address = Address::where('full_address',$request->location)->orWhere('full_address','like',$request->location.'%')->orWhere('full_address','like','%'.$request->location)->orWhere('full_address','like','%'.$request->location.'%')->get();
            $query = Propertie::whereHas('address',function($query) use ($location){ $query->where('full_address',$location)->orWhere('full_address','like',$location.'%')->orWhere('full_address','like','%'.$location)->orWhere('full_address','like','%'.$location.'%');  });
        }else{
            $query = Propertie::where('status',0);
        }
        if($request->storage_type){
            $storage_type = Category::where('slug',$request->storage_type)->first();
           
            if($storage_type){
                 $category = $storage_type->id;
                $query->whereHas('storages',function($query) use ($category){ $query->where('category_id',$category); })->with('storages',function($query) use ($category){ $query->where('category_id',$category); });
            }
        }else{
            $category = null;
        }
        if($request->sizes){
            $sizes = Sizes::where([['slug',$request->sizes],['category_id',$category]])->first();
           
            if($sizes){
                 $size_id = $sizes->id;
                    $query->whereHas('storages',function($query) use ($size_id){ $query->where('size_id',$size_id); })->with('storages',function($query) use ($size_id){ $query->where('size_id',$size_id); });
            }
        }
        $storage_types = Category::where('status',1)->get();
        $properties = $query->get();
        $selected_category = Category::where('slug',$request->storage_type)->first();
        if(!$selected_category){
            $selected_category = Category::first();
        }
            $sizes_filter = Sizes::where('category_id',$selected_category->id)->get();
            $feature_filter = Feature::where('category_id',$selected_category->id)->get();
       

        return view('Front.search.index',compact('storage_types','properties','site_features','sizes_filter','feature_filter'));
    }
    public function StorageDetail($slug){
        $site_features = SiteFeature::all();
        $category = Category::where('status',1)->first();
        $cat_id = $category->id;
        $propertie = Propertie::where('slug',$slug)->first();
        if(!$propertie){
            abort(404);
        }
        $storage_types = Category::where('status',1)->get();
        $address = $propertie->address;
        $near_by_properties = Propertie::where([['id','!=',$propertie->id]])->whereHas('address',function($query) use ($address){ $query->where('address',$address->address)->orWhere('city',$address->city)->orWhere('state',$address->state)->orWhere('pincode',$address->pincode);  })->get();
      
        return view('Front.search.storage_detail',compact('propertie','storage_types','site_features','near_by_properties'));
    }
    public function filterResponse(Request $request){
        
        $propertie = Propertie::where('slug',$request->slug)->first();
        if(!$propertie){
            return response()->json('error','Failed! Something went wrong');
        }
        $query = Storage::where('propertie_id',$propertie->id);
        if($request->category){
            $query->where('category_id',$request->category);
        }
        if($request->sizes){
            $sizes = $request->sizes;
            $query->whereIn('size_id',$sizes);
        }
        if($request->features){
            foreach($request->features as $features){
                $query->orWhereJsonContains('features',$features);
            }
        }
        $storages = $query->get();
        $storage_features = [];
        if($storages->isNotEmpty()){
            foreach($storages as $storage){
                $feature_ids = json_decode($storage->features);
                $storage_features[] = Feature::whereIn('id',$feature_ids)->get();
            }
            return response()->json(['success'=>$storages,'features'=>$storage_features]);
        }else{
            return response()->json(['error'=>'We weren’t able to find your location. Please enter your City, State or ZIP to see locations near you.']);
        }
        return $request->all();
    }
    public function indexFilterResponse(Request $request){
        // return $request->features;
        if($request->location){
            $location = $request->location;
            $query = Propertie::whereHas('address',function($query1) use ($location){ $query1->where('full_address',$location)->orWhere('full_address','like',$location.'%')->orWhere('full_address','like','%'.$location)->orWhere('full_address','like','%'.$location.'%');  });
        }
        if($request->category){
            $category = Category::where('slug',$request->category)->first()->id;
            $query->whereHas('storages',function($query2) use ($category){ $query2->where('category_id',$category); })->with('storages',function($query6) use ($category){ $query6->where('category_id',$category); });
        }
        if($request->features){
            $feature = json_encode($request->features);
            $query->whereHas('storages',function($query3) use ($feature){ $query3->whereJsonContains('features',$feature);  })->with('storages',function($query7) use ($feature){ $query7->whereJsonContains('features',$feature); });
        }
        if($request->size){
            $size = $request->size;
            $query->whereHas('storages',function($query4) use ($size){ $query4->where('size_id',$size); })->with('storages',function($query8) use ($size){ $query8->where('size_id',$size); });
        }
        return $query->get();
    }
}
