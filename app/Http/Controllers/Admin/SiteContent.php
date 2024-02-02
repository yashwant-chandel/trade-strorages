<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeContent;

class SiteContent extends Controller
{
   public function homepage(){

        return view('Admin.site_content.home_page');
   }
   public function saveHome(Request $request){

    $homecontent = new HomeContent;
    $homecontent->header_text = $request->header_text;
    if($request->haFile('banner_image')){
        $file = $request->hasFile('banner_image');
        $filename = 'Banner'.time().'.'.$file->extension();
        $file->move(public_path('site_images'),$filename);
        $homecontent->banner_image = $filename;
    }
    $homecontent->banner_title = $request->banner_title;
    $homecontent->banner_subtitle = $request->banner_subtitle;
    $homecontent->banner_offer_text = $request->banner_offer_text;
    $homecontent->second_section_heading = $request->second_section_heading;
    $homecontent->second_section_text = $request->second_section_text;

    // $homecontent->slider_data = $request->slider_data;

    $homecontent->third_section_title = $request->third_section_title;
    $homecontent->third_section_text = $request->third_section_text;
    $homecontent->process_section_title = $request->process_section_title;

    // $homecontent->process_section_process = $request->process_section_process;

    $homecontent->status = 1;
    $homecontent->save();
   }

}
