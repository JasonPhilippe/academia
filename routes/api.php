<?php

use App\Http\Controllers\ControllerRegisterUserByPhone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('registeruserbyphone',[ControllerRegisterUserByPhone::class,'registerUserFromPhone'])->name('registeruserbyphone');
//Route::post('login',[ControllerRegisterUserByPhone::class,'login'])->name('login');
//Route::post('register',[ControllerRegisterUserByPhone::class,'register'])->name('register');
//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});