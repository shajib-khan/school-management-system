<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Hash;
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
        //$remember =!empty($request->remember)? true : false;
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password],true))
        {
            return redirect('admin/dashboard');
        }
        else{
            return redirect('login');
        }
    }
    public function logout(){
        Auth::logout();
        return redirect (url(''));
    }

}
