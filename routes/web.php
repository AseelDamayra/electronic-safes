<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\AuthController as AuthAdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//user
Route::get('/login', [AuthController::class,'index']);
Route::post('/login', [AuthController::class,'send']);

Route::get('/loginAdmin', [AuthAdminController::class,'index']);
Route::post('/loginAdmin', [AuthAdminController::class,'send']);
Route::get('/logoutAdmin', [AuthAdminController::class,'logout']);
Route::get('/admin', [AdminHomeController::class,'index']);
Route::get('/avilableC', [AdminHomeController::class,'avilableC']);
Route::get('/searchAvilable', [AdminHomeController::class,'search']);
Route::post('/avilableSend', [AdminHomeController::class,'send']);
Route::get('/mahjoza', [AdminHomeController::class,'mahjoza']);
Route::get('/DeleteCAdmin/{id}', [AdminHomeController::class,'DeleteCAdmin']);
 Route::get('/searchmahjoza', [AdminHomeController::class,'searchmahjoza']);


Route::middleware('is-login')->group(function(){

    Route::get('/', [HomeController::class,'index']);
    Route::get('/search', [HomeController::class,'search']);
    Route::post('/profile', [HomeController::class,'profile']);
    Route::get('/DeleteC/{id}', [HomeController::class,'DeleteC']);
     Route::post('/renewal/{id}', [HomeController::class,'renewal']);
    Route::post('/booking/{id}', [HomeController::class,'booking']);
    Route::get('/logout', [AuthController::class,'logout']);


});