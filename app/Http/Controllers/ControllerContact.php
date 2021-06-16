<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ControllerContact extends Controller
{
    public function index(){
        return view('home.contact');
    }
    public function sendMessage(Request $request){

        return $this->index();
    }
}
