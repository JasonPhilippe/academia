<?php

namespace App\Http\Controllers;

use App\Models\Profils;
use App\Models\University;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ControllerLogin extends Controller
{

    function login(){
        return view('home/home');

    }
    public function home(){
        return view('home.home');
    }
    public  function check(Request $request){
        // return $request->input();
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:6|max:12'
        ]);

        $profil = Profils::where('email', '=', $request->email)->first();
        //printf($profil);


        if(!$profil){
            return back()->with('fail','désolé, votre email n\'existe pas');
        }else{
            if(Hash::check($request->password, $profil->password))
            {
//                $univ = DB::table('universities')
//                    ->where('id',$profil->id_universite)
//                    ->select('nom')
//                    ->first();

                if($profil->status == "admin-academia") {
                    $request->session()->put('AdminLoginId', $profil->id_profils);
                    $request->session()->put('adminUserName', $profil->username);
                    $request->session()->put('adminEmail', $profil->email);
                    $request->session()->put('adminStatut', $profil->status);
                    $request->session()->put('adminPhoto', $profil->photo);

                }
                else{
                    $request->session()->put('AdminLoginId', $profil->id_profils);
                    $request->session()->put('adminUserName', $profil->username);
                    $request->session()->put('adminEmail', $profil->email);
                    $request->session()->put('adminStatut', $profil->status);
                    $request->session()->put('adminPhoto', $profil->photo);
//                    $request->session()->put('adminNomUniversite', $univ->nom);
                    $request->session()->put('adminIdUniversite', $profil->id_universite);
                    $request->session()->put('adminIdProfessors', $profil->id_professeurs);

//                echo(Session::get('adminUserName'));
                }
                return redirect('/admin/dashboard');


            }else{
                return back()->with('fail','mot de passe Incorrect');
            }
        }
    }

    public function logout(){
        if(session()->has('AdminLoginId')){
            session()->pull('AdminLoginId');
            return redirect('/home/login');
        }
    }
//    public function dashboard(){
//        $data = ['LoggedUserInfo'=>Profils::where('id_profils','=', session('AdminLoginId'))->first()];
//        return view('admin.dashboard',$data);
//    }



}
