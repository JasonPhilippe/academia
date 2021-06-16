<?php

use App\Http\Controllers\ControllerContact;
use App\Http\Controllers\ControllerCote;
use App\Http\Controllers\ControllerCours;
use App\Http\Controllers\ControllerDepartement;
use App\Http\Controllers\ControllerFacultes;
use App\Http\Controllers\ControllerLogin;
use App\Http\Controllers\ControllerProfessors;
use App\Http\Controllers\ControllerProfils;
use App\Http\Controllers\ControllerProfilsUniversity;
use App\Http\Controllers\ControllerPromotions;
use App\Http\Controllers\ControllerStudents;
use App\Http\Controllers\ControllerUniversity;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


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

Route::get('/', function () {
    return view('home/home');
})->name('home');


Route::get('/about', function () {
    return view('home/about');
})->name('about');

Route::get('/terms', function () {
    return view('home/terms');
})->name('terms');
Route::get('/faq', function () {
    return view('home/faq');
})->name('faq');
Route::get('/error', function () {
    return view('home/error');
})->name('error');
//
//Route::get('/students', function () {
//    return view('admin/students');
//})->name('students');

//Route::get('/university', function () {
//    return view('admin/university');
//})->name('university');
//Route::view('/university','admin/university')->name('university');
Route::view('profils_univ','admin/profils_univ')->name('profils_univ');


//dashboard

Route::get('logout',[ControllerLogin::class,'logout'])->name('logout');
Route::post('login',[ControllerLogin::class,'check'])->name('login');
Route::get('home/login',[ControllerLogin::class,'login'])->name('home/login');


Route::group(['middleware'=>['AuthCheck']], function(){

    //for university
    Route::get('university',[ControllerUniversity::class,'index'])->name('univ');
    Route::post('save_university',[ControllerUniversity::class,'save'])->name('save_university');
    Route::post('update_university',[ControllerUniversity::class,'update'])->name('update_university');
    Route::get('delete_university/{id}',[ControllerUniversity::class,'delete'])->name('delete_university');

//for students
    Route::get('students',[ControllerStudents::class,'index'])->name('students');
    Route::post('save_students',[ControllerStudents::class,'save'])->name('save_students');
    Route::post('update_students',[ControllerStudents::class,'update'])->name('update_students');
    Route::get('delete_students/{id}',[ControllerStudents::class,'delete'])->name('delete_students');

//for facultes
    Route::get('facultes',[ControllerFacultes::class,'index'])->name('facultes');
    Route::post('save_facultes',[ControllerFacultes::class,'save'])->name('save_facultes');
    Route::post('update_facultes',[ControllerFacultes::class,'update'])->name('update_facultes');
    Route::get('delete_facultes/{id}',[ControllerFacultes::class,'delete'])->name('delete_facultes');

//for departement
    Route::get('departements',[ControllerDepartement::class,'index'])->name('departements');
    Route::post('save_departements',[ControllerDepartement::class,'save'])->name('save_departements');
    Route::post('update_departements',[ControllerDepartement::class,'update'])->name('update_departements');
    Route::get('delete_departements/{id}',[ControllerDepartement::class,'delete'])->name('delete_departements');

//for promotion
    Route::get('promotion',[ControllerPromotions::class,'index'])->name('promotion');
    Route::post('save_promotion',[ControllerPromotions::class,'save'])->name('save_promotion');
    Route::post('update_promotion',[ControllerPromotions::class,'update'])->name('update_promotion');
    Route::get('delete_promotion/{id}',[ControllerPromotions::class,'delete'])->name('delete_promotion');

//contact
    Route::get('contact', [ControllerContact::class,'index'])->name('contact');
    Route::post('sendmessage',[ControllerContact::class,'sendMessage'])->name('sendmessage');

//for professeurs
    Route::get('professeurs',[ControllerProfessors::class,'index'])->name('professeurs');
    Route::post('save_professeurs',[ControllerProfessors::class,'save'])->name('save_professeurs');
    Route::post('update_professeurs',[ControllerProfessors::class,'update'])->name('update_professeurs');
    Route::get('delete_professeurs/{id}',[ControllerProfessors::class,'delete'])->name('delete_professeurs');

//for profils
    Route::get('profils',[ControllerProfils::class,'index'])->name('profils');
    Route::post('save_profils',[ControllerProfils::class,'save'])->name('save_profils');
    Route::post('update_profils',[ControllerProfils::class,'update'])->name('update_profils');
    Route::get('delete_profils/{id}',[ControllerProfils::class,'delete'])->name('delete_profils');

//for profils universite
    Route::get('profils_univ',[ControllerProfilsUniversity::class,'index'])->name('profils_univ');
    Route::post('save_profils_univ',[ControllerProfilsUniversity::class,'save'])->name('save_profils_univ');
    Route::post('update_profils_univ',[ControllerProfilsUniversity::class,'update'])->name('update_profils_univ');
    Route::get('delete_profils_univ/{id}',[ControllerProfilsUniversity::class,'delete'])->name('delete_profils_univ');

//for course
    Route::get('cours',[ControllerCours::class,'index'])->name('cours');
    Route::post('save_cours',[ControllerCours::class,'save'])->name('save_cours');
    Route::post('update_cours',[ControllerCours::class,'update'])->name('update_cours');
    Route::get('delete_cours/{id}',[ControllerCours::class,'delete'])->name('delete_cours');

//for cotes
    Route::get('cotes',[ControllerCote::class,'index'])->name('cotes');
    Route::post('save_cotes',[ControllerCote::class,'save'])->name('save_cotes');
    Route::post('update_cotes',[ControllerCote::class,'update'])->name('update_cotes');
    Route::get('delete_cotes/{id}',[ControllerCote::class,'delete'])->name('delete_cotes');
    Route::post('getstudentbypromotion',[ControllerCote::class,'getstudentbypromotion'])->name('getstudentbypromotion');
    Route::post('getcoursebypromo',[ControllerCote::class,'getcoursebypromo'])->name('getcoursebypromo');
    Route::get('/admin/dashboard',[ControllerLogin::class,'dashboard']);

});
//Auth::routes();
