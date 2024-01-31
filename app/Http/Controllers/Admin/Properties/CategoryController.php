<?php

namespace App\Http\Controllers\Admin\Properties;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Sizes;
use App\Models\Feature;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('Admin.properties.categories',compact('categories'));
    }
    public function submitProcc(Request $request){
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'icon' => 'required',
        ]);
        if($request->id){
            $catgory = Category::find($request->id);
            $catgory->name = $request->name;
            $catgory->slug = $request->slug;
            $catgory->icon = $request->icon;
            $catgory->update();
            return redirect()->back()->with('success','Successfully updated Storage Type');
        }else{
            $catgory = new Category;
            $catgory->name = $request->name;
            $catgory->slug = $request->slug;
            $catgory->icon = $request->icon;
            $catgory->save();            
            return redirect()->back()->with('success','successfully created new Storage type');
        }
    }
    public function delete($id){
        $categories = Category::find($id);
        if(!$categories){
            abort(404);
        }
        $categories->delete();
        return redirect()->back()->with('success','Successfully deleted Storage type');
    }
    public function sizes($slug){
        $category = Category::where('slug',$slug)->first();
        if(!$category){
            abort(404);
        }
        $sizes = Sizes::where('category_id',$category->id)->get();

        return view('Admin.properties.sizes',compact('sizes','category'));
    }
    public function sizeSubmit(Request $request){
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'description' => 'required',
        ]);
        if($request->id){
            $size = Sizes::find($request->id);
            $size->name = $request->name;
            $size->slug = $request->slug;
            $size->category_id = $request->category_id;
            $size->description = $request->description;
            $size->update();
            return redirect()->back()->with('success','Successfully updated size');
        }else{
            $size = new Sizes;
            $size->name = $request->name;
            $size->slug = $request->slug;
            $size->category_id = $request->category_id;
            $size->description = $request->description;
            $size->save();
            return redirect()->back()->with('success','Successfully saved size');
        }
        return redirect()->back()->with('error','Failed! something went wrong');
    }
    public function sizedelete($id){
        if(!$id){
            abort(404);
        }
      $size = Sizes::find($id);
      if(!$size){
        abort(404);
      }
      $size->delete();
      return redirect()->back()->with('success','Successfully deleted size');
    }
    public function features($slug){
        $category = Category::where('slug',$slug)->first();
        if(!$category){
            abort(404);
        }
        $features = Feature::where('category_id',$category->id)->get();

        return view('Admin.properties.features',compact('features','category'));
    }
    public function featureSubmit(Request $request){
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'icon' => 'required',
        ]);
        if($request->id){
            $feature = Feature::find($request->id);
            $feature->name = $request->name;
            $feature->slug = $request->slug;
            $feature->icon = $request->icon;
            $feature->category_id = $request->category_id;
            $feature->status = 1;
            $feature->update();
            return redirect()->back()->with('success','Successfully updated feature');
        }else{
            $feature = new Feature;
            $feature->name = $request->name;
            $feature->slug = $request->slug;
            $feature->icon = $request->icon;
            $feature->category_id = $request->category_id;
            $feature->status = 1;
            $feature->save();
            return redirect()->back()->with('success','Successfully saved feature');
        }
    }
    public function featuredelete($id){
        if(!$id){
            abort(404);
        }
        $feature = Feature::find($id);
        if(!$feature){
            abort(404);
        }
        $feature->delete();
        return redirect()->back()->with('success','successfully deleted');
    }

}
