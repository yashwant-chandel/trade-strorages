<?php
namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Propertie;
use App\Models\Address;
use App\Models\Sizes;
use App\Models\SiteFeature;

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
        return view('Front.search.index',compact('storage_types','properties','site_features'));
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
}
