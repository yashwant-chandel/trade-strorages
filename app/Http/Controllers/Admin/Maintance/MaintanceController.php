<?php

namespace App\Http\Controllers\Admin\Maintance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MaintanceController extends Controller
{
    public function index(){
        return view('Admin.maintenance.index');
    }
}
