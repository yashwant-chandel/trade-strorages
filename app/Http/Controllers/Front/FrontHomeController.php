<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\SiteMeta;
use App\Models\HomeContent;
use App\Models\Category;
use App\Models\Sizes;
use App\Models\Feature;

class FrontHomeController extends Controller
{
   public function index(){
      $stripe = new \Stripe\StripeClient( env('STRIPE_SECRET_KEY') );
      $invoice = $stripe->invoices->retrieve(
       'in_1OjLURSHFLlPQCJ7RRVCJRP8',
        []
      );
      dd($invoice);
      $homecontent = HomeContent::where('status',1)->first();
      $storage_types = Category::where('status',1)->get();

      return view('Front.home.index',compact('homecontent','storage_types'));
   }
   public function getSizes(Request $request){
      $category = Category::where('slug',$request->value)->first();
      $sizes = Sizes::where('category_id',$category->id)->get();
      return response()->json($sizes);
   }
   public function getFeatures(Request $request){
      $category = Category::where('slug',$request->value)->first();
      $features = Feature::where('category_id',$category->id)->get();
      
      return response()->json($features);
   }
}
