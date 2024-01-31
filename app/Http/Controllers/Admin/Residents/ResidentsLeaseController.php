<?php

namespace App\Http\Controllers\Admin\Residents;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ResidentsLeaseController extends Controller
{
    public function index(){

        return view('Admin.residents.index');
    }
}
