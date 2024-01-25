<?php

namespace App\Http\Controllers\Admin\Properties;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Propertie;
use App\Models\Media;
use App\Models\Address;

class PropertiesController extends Controller
{
    public function index(){
        return view('Admin.properties.addproperty');
    }
    public function submitProcc(Request $request){
        // $request->validate([
        //     'address' => 'required',
        //     'city' => 'required',
        //     'state' => 'required',
        //     'pincode' => 'required',
        //     'url' => 'required',
        //     'featured_image' => 'required',
        //     'gallery_images' => 'required',
        // ]);
        echo '<pre>';
        print_r($request->all());
        echo '</pre>';

    }
    public function list(){

        return view('Admin.properties.propertylist');
    }
}
