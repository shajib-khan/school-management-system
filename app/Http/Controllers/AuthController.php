<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Hash;
use App\Models\User;
class AuthController extends Controller
{
    public function login(){
        if(Auth::check())
        {
            if(Auth::user()->user_type == 1){
                return redirect('admin/dashboard');
            }
            else if(Auth::user()->user_type==2){
                return redirect('teacher/dashboard');
            }
            else if(Auth::user()->user_type==3){
                return redirect('student/dashboard');
            }
            else if(Auth::user()->user_type==4){
                return redirect('parent/dashboard');
            }
        }
        return view('auth.login');
    }
    public function AuthLogin(Request $request){
        //$remember =!empty($request->remember)? true : false;
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password],true))
        {
            if(Auth::user()->user_type == 1){
                return redirect('admin/dashboard');
            }
            else if(Auth::user()->user_type==2){
                return redirect('teacher/dashboard');
            }
            else if(Auth::user()->user_type==3){
                return redirect('student/dashboard');
            }
            else if(Auth::user()->user_type==4){
                return redirect('parent/dashboard');
            }
        }else{
            return redirect()->back()->with('error', 'please enter current email and password');
        }
    }
    public function PostForgotPassword(Request $request){
        dd($request->all());
    }
    public function forgotPassword(){
        return view('auth.forgot');
    }
    public function logout(){
        Auth::logout();
        return redirect (url(''));
    }

}
