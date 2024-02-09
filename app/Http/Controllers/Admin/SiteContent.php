<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeContent;
use App\Models\SiteFeature;

class SiteContent extends Controller
{
   public function homepage(){
    $homecontent = HomeContent::where('status',1)->first();

        return view('Admin.site_content.home_page',compact('homecontent'));
   }
   public function saveHome(Request $request){
    // $homecontent = new HomeContent;
    $homecontent = HomeContent::where('status',1)->first();
    if($request->hasFile('banner_image')){
        $file = $request->file('banner_image');
        $filename = 'Banner'.time().'.'.$file->extension();
        $file->move(public_path('site_images'),$filename);
        $homecontent->banner_image = $filename;
    }
    $homecontent->banner_title = $request->banner_title;
    $homecontent->banner_subtitle = $request->banner_sub_title;
    if($request->hasFile('banner_offer_image')){
        $file = $request->file('banner_offer_image');
        $filename = 'Offer'.time().'.'.$file->extension();
        $file->move(public_path('site_images'),$filename);
        $homecontent->banner_offer_text = $filename;
    }
    $homecontent->second_section_heading = $request->second_section_heading;
    $homecontent->second_section_text = $request->second_section_text;

        if($request->for_slider_section == 'on'){
            if($request->slider_image){
                $slider_data = [];
                for($i=0; $i<count($request->slider_image); $i++ ){
                    $file = $request->file('slider_image')[$i];
                    $filename = 'SiteContent'.time().rand(1,100).'.'.$file->extension();
                    $file->move(public_path('site_images'),$filename);
                    $data = ['image'=>$filename,'text'=>$request->slider_text[$i]];
                    array_push($slider_data,$data);
                }
                $homecontent->slider_data = json_encode($slider_data);
                // print_r($slider_data);
            }else{
                $homecontent->slider_data = null;    
            }
        }
        if($request->for_process_section == 'on'){
            if($request->process_image){
                $process_data = [];
                for($i=0; $i<count($request->process_image); $i++ ){
                    $file = $request->file('process_image')[$i];
                    $filename = 'SiteContent'.time().rand(1,100).'.'.$file->extension();
                    $file->move(public_path('site_images'),$filename);
                    $data = ['image'=>$filename,'text'=>$request->process_text[$i]];
                    array_push($process_data,$data);
                }
                $homecontent->process_section_process = json_encode($process_data);
                // print_r(count($request->process_image));
            }else{
                $homecontent->process_section_process = null;
                }
        }
    $homecontent->third_section_title = $request->third_section_heading;
    $homecontent->third_section_text = $request->third_section_text;
    $homecontent->process_section_title = $request->process_section_heading;

    // $homecontent->process_section_process = $request->process_section_process;
    $homecontent->status = 1;
    $homecontent->save();
    return redirect()->back()->with('success','Successfully updted');
   }
   public function features(){
    $features = SiteFeature::where('status',1)->get();

    return view('Admin.site_content.site_features',compact('features'));
   }
   public function featureSubmit(Request $request){
    
    $request->validate([
        'title' => 'required',
        // 'description' => 'required',
    ]);
    if($request->id){
        $siteFeatures = SiteFeature::find($request->id);
        $siteFeatures->title = $request->title;
        $siteFeatures->description = $request->description;
        $siteFeatures->update();
        return redirect()->back()->with('success','successfully updated site features');
    }else{
        $siteFeatures = new SiteFeature;
        $siteFeatures->title = $request->title;
        $siteFeatures->description = $request->description;
        $siteFeatures->save();
        return redirect()->back()->with('success','successfully saved site features');
    }
   }
   public function featureDelete($id){

        $feature = SiteFeature::find($id);
        if(!$feature){
            abort(404);
        }
        $feature->delete();
        return redirect()->back()->with('success','Successfully deleted site feature');
   }
   public function facilitiesContent(){
        
        return view('Admin.site_content.facilitiy');
   }
}
