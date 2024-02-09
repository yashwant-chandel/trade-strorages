<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontMetaPagesController extends Controller
{
    public function storageFacilities(){
        
        return view('Front.facilities.index');
    }
    public function support(){

        return view('Front.meta.support');
    }
    public function companyInfo(){

        return view('Front.meta.company_info');
    }
}
