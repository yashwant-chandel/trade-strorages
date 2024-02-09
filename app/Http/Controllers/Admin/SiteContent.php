<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeContent;
use App\Models\SiteFeature;
use App\Models\FacilityContent;

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
        $data = FacilityContent::where('status',1)->first();

        return view('Admin.site_content.facilitiy',compact('data'));
   }
   public function facilitySubmit(Request $request){
        echo '<pre>';
        print_r($request->all());
        echo '</pre>';
        // die();
        $data = FacilityContent::where('status',1)->first();
        if($request->action == 'banner'){
            $data->banner_text = $request->banner_text;
            if($request->hasFile('image')){
                $data->banner_image = $this->uploadImage($request);
            }
        }elseif($request->action == 'second_section'){
            $data->second_section_title = $request->second_section_title;
            if($request->hasFile('icons')){
            $description = ['images' => $this->uploadImage($request),'text' => json_encode($request->text) ];
            $data->second_section_description = json_encode($description);
            }
        }elseif($request->action == 'third_section'){
            $data->third_section_title = $request->third_section_title;
            $data->third_section_left_text = $request->left_text;
            $data->third_section_left_text = $request->right_text;
            if($request->hasFile('image')){
            $data->third_section_image = $this->uploadImage($request);
            }
           
        }elseif($request->action == 'fourth_section'){
            $data->fourth_section_title = $request->fourth_section_title;
            $data->fourth_section_right_image = $this->uploadImage('image');
            $data->fourth_section_left_text = json_encode(['title'=>$request->left_title,'description'=>$request->left_description]);

        }elseif($request->action == 'fifth_section'){
            $data->fifth_section_title = $request->fifth_section_title;
            $data->fifth_section_text = json_encode($request->features);
        }
        $data->update();
        return redirect()->back()->with('success','Successfully updated');
   }

   public function uploadImage($request){
    if($request->hasFile('image')){
        $file = $request->file('image');
        $filename = 'Img'.time().rand(1,100).'.'.$file->extension();
        $file->move(public_path('site_images'),$filename);
        return $filename;
    }
    if($request->hasFile('icons')){
        $images = [];
        foreach($request->file('icons') as $file){
            $filename = 'Img'.time().rand(1,100).'.'.$file->extension();
            $file->move(public_path('site_images'),$filename);
            array_push($images,$filename);
        }
        return $images;
    }
   }
}
