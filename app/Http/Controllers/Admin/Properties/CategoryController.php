<?php

namespace App\Http\Controllers\Admin\Properties;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

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
}
