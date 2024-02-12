<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index(){

        return view('Front.reservation.reservation');
     
    }
    public function confirmation(){
        return view('Front.reservation.confirmation');
    }
    
}
