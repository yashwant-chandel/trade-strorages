<?php

namespace App\Http\Controllers\authentication;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Auth;

class AuthenticationController extends Controller
{
 public function index(){
  return view('Authentication.login');
 }
    public function loginProcc(Request $req){
            $req->validate([
                'email' => 'required',
                'password' => 'required',
                'g-recaptcha-response' => 'required'
            ]);
            $recaptcha = $_POST['g-recaptcha-response'];
                    $secret_key = env('G_RECAPTCHA_SECRETKEY');
                    $url = 'https://www.google.com/recaptcha/api/siteverify?secret='. $secret_key . '&response=' . $recaptcha;
                    $response_json = file_get_contents($url);
                    $response = (array)json_decode($response_json);
            if($response['success'] == 1){
                
            }else{
                return redirect()->back()->with(['error'=>'Google recaptcha is not valid']);
            }
            if(Auth::attempt(['email'=>$req->email,'password'=>$req->password])){
                if(Auth::user()->is_admin == 1){
                    return redirect('/admin-dashboard')->with(['success'=>'welcome to admin Dashboard']);
                }else{
                    return redirect('/logout');
                }                
            }else{
                return redirect()->back()->with(['error'=>'your credentials are wrong failed to login']);
            }

    }
    public function logout(){
        Auth::logout();
        return redirect('/')->with('success',"You have logged out succesfully");
    }

}
