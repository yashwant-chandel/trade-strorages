<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SiteContent extends Controller
{
   public function homepage(){

        return view('Admin.site_content.home_page');
   }

   public function saveHome(Request $request){
     
   }

}
