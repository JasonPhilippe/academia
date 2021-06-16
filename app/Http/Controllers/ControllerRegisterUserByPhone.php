<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class ControllerRegisterUserByPhone extends Controller
{

    public function registerUserFromPhone(Request $request){
       $request->validate([
           'firstname'=>'required',
           'lastname'=>'required',
           'phone'=>'required',
           'sexe'=>'required',
           'profession'=>'required',
           'token_phone'=>'required',
           'ip_device'=>'required',
           'email'=>'required|email|unique:users,email',
           'password'=>'required|min:6|max:24|confirmed'
       ]);

       $allData = $request->all();
       $user =  User::create($allData);

       $resArr = [];
       $resArr['token'] = $user->createToken('api-application')->accessToken();
       $resArr['firstname'] = $user->firstname;

       return response()->json($resArr,200);

   }
}
