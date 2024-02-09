<?php

namespace App\Http\Controllers\Admin\Testimonials;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;

class TestimonialsController extends Controller
{
    public function index(){
        $testimonial = Testimonial::all();

        return view('Admin.testimonials.index',compact('testimonial'));
    }
    public function add($id = null){
        $testimonial = Testimonial::find($id);

        return view('Admin.testimonials.add',compact('testimonial'));
    }
    public function addProcc(Request $request){
       
        $request->validate([
            'name' => 'required',
            'text' => 'required',
            'position' => 'required',
            'image' => 'required',
        ]);
    if($request->id){
        $testimonial = new Testimonial;
        $testimonial->name = $request->name;
        $testimonial->text = $request->text;
        $testimonial->position = $request->position;
        if($request->hasFile('image')){
            $file = $request->file('image');
            $filename = 'Testimonial'.time().rand(1,100).'.'.$file->extension();
            $file->move(public_path('site_images'),$filename);
            $testimonial->image = $filename;
        }
        $testimonial->update();
    }else{
        $testimonial = new Testimonial;
        $testimonial->name = $request->name;
        $testimonial->text = $request->text;
        $testimonial->position = $request->position;
        if($request->hasFile('image')){
            $file = $request->file('image');
            $filename = 'Testimonial'.time().rand(1,100).'.'.$file->extension();
            $file->move(public_path('site_images'),$filename);
            $testimonial->image = $filename;
        }
        $testimonial->save();
        return redirect()->back()->with('success','Successfully saved testimonials');
    }
    }
    public function delete($id){
        $testimonial = Testimonial::find($id);
        if(!$testimonial){
            abort(404);
        }
        $testimonial->delete();
        return redirect()->back()->with('success','Successfully deleted data');
    }
}
