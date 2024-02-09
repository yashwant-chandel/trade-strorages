<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogCategory;
use App\Models\Blog;

class AdminBlogController extends Controller
{
    public function index(){
        $blogs = Blog::where('status',1)->get();

        return view('Admin.blogs.index',compact('blogs'));
    }
    public function add($slug = null){
        $blog = Blog::where('slug',$slug)->first();
        if($slug){
        if(!$blog){
            abort(404);
        }
    }
        $categories = BlogCategory::where('status',1)->get();

        return view('Admin.blogs.add_blogs',compact('categories','blog'));
    }
    public function submitProcc(Request $request){
          
            $request->validate([
                'title'=>'required',
                'image' => 'required',
                'description' => 'required',
                'category' => 'required',
            ]);
            $blog = new Blog;
            $blog->title = $request->title;
            $blog->slug = strtolower(str_replace(" ","-",$request->title));
            if($request->hasFile('image')){
                $file = $request->file('image');
                $filename = 'blog'.time().rand(1,100).'.'.$file->extension();
                $file->move(public_path('blog_images'),$filename);
            $blog->image = $filename;
            }
            $blog->category_id = $request->category;
            $blog->description = $request->description;
            $blog->status = 1;
            $blog->save();
            return redirect()->back()->with('success','Successfully saved blog');
    }
    public function deleteBlog($id){
        $blog = Blog::find($id);
        if(!$blog){
            return redirect()->back()->with('error','Something went wrong');
        }
        $blog->delete();
        return redirect()->back()->with('success','Successfully deleted blog');
    }
    public function categories(){
        $categories = BlogCategory::where('status',1)->get();
        return view('Admin.blogs.catgories',compact('categories'));
    }
    public function categorySubmit(Request $request){
       
        $request->validate([
            'name' => 'required|unique:blog_categories,name,'.$request->id,
        ]);
        if($request->id){
            $category = BlogCategory::find($request->id);
            $category->name = $request->name;
            $category->slug = strtolower(str_replace(" ","-",$request->name));
            $category->update();
            return redirect()->back()->with('success','successfully updated category');

        }else{
            $category = new BlogCategory; 
            $category->name = $request->name;
            $category->slug = strtolower(str_replace(" ","-",$request->name));
            $category->save();
            return redirect()->back()->with("success",'Successfully saved category');
        }
    }
    public function categoryDelete($id){
        $category = BlogCategory::find($id);
        if(!$category){
            return redirect()->back()->with('error','Something went wrong');
        }
        $category->delete();
        return redirect()->back()->with('success','Successfully deleted category');

    }
}
