<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\SiteMeta;

class FrontHomeController extends Controller
{
   public function index(){
     

      return view('Front.home.index');
   }
}
