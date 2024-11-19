<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function login(){
        if(!empty(Auth::check()))
        {
            return redirect('admin/dashboard');
        }
        return view('auth.login');
    }
    public function AuthLogin(Request $request){
        $remember =!empty($request->remember)? true : false;
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password],$remember))
        {
            return redirect('admin/dashboard');
        }
        else{
            return redirect()->back()->with('error', 'please enter your valid email');
        }
    }
}
