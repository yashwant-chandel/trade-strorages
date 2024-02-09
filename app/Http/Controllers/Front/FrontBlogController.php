<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\BlogCategory;

class FrontBlogController extends Controller
{
    public function index($slug = null){
        $categories = BlogCategory::where('status',1)->get();
        $category = BlogCategory::where('slug',$slug)->first();
        if($slug){
            // if(!$category){
            //     abort(404);
            // }
            $blogs = Blog::where([['status',1],['category_id',$category->id]])->orderBy('created_at','desc')->get();
        }else{
        $blogs = Blog::where('status',1)->orderBy('created_at','desc')->get();
        }

        return view('Front.blogs.index',compact('categories','blogs'));
    }
    public function deatilPage($slug){
        $blog_data = Blog::where('slug',$slug)->first();
        $categories = BlogCategory::where('status',1)->get();
        $related_blogs = Blog::where([['category_id',$blog_data->category_id],['id','!=',$blog_data->id]])->get();

        return view('Front.blogs.blog_detail',compact('blog_data','related_blogs','categories'));
    }

}
