<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminDashController extends Controller
{
    public function index(){
        return view('Admin.dashboard');
    }
    public function test(){
        $subscription_id = 'sub_1O7Gg7SHFLlPQCJ7aToZvFzG';
        $stripe = new \Stripe\StripeClient( env('STRIPE_SECRET_KEY') );
        $subscriptiondetail =  $stripe->subscriptions->retrieve(
            $subscription_id,
            []
        );
       $latest_invoice = $subscriptiondetail->latest_invoice;
       $invoices = $stripe->invoices->retrieve($latest_invoice, []);
       dd($invoices);
    }
}
