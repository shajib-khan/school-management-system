<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', function () {
 //   return view('welcome');
//});
Route::get('/',[AuthController::class,'login']);
Route::post('login',[AuthController::class,'AuthLogin']);
Route::get('logout',[AuthController::class,'logout']);
Route::get('forgot-password',[AuthController::class,'forgotPassword']);
Route::post('forgot-password',[AuthController::class,'PostForgotPassword']);



Route::get('admin/admin/list', function () {
    return view('admin.admin.list');
});

//admin
Route::group(['middleware'=>'admin'],function (){
    Route::get('admin/dashboard',[DashboardController::class,'dashboard']);
});
//teacher
Route::group(['middleware'=>'teacher'],function (){
    Route::get('teacher/dashboard', [DashboardController::class,'dashboard']);
});
//student
Route::group(['middleware'=>'student'],function (){
    Route::get('student/dashboard', [DashboardController::class,'dashboard']);
});
//parent
Route::group(['middleware'=>'parent'],function (){
    Route::get('parent/dashboard', [DashboardController::class,'dashboard']);
});
