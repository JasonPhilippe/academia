<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Universty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Validator;
use PhpParser\Node\Expr\Array_;

class ControllerUniversity extends Controller
{
    public function index(){
        $data = DB::table('universities')->get();
//        var_dump($data);
        return view('admin.university',compact('data'));
    }
    public function save(Request $request){

     $request->validate([
            'nom'=> 'required',
            'adresse'=> 'required',
            'phone'=> 'required|max:10',
            'image'=> 'required|image|max:2048',
            'email' => 'required|email'
        ]);
     $image = $request->file('image');
     $new_img = substr($request->nom,0,3)."-".rand().'.'.$image->getClientOriginalExtension();
     $image->move(public_path('img'),$new_img);
//     Universty::create([
//         'nom'=> $request->input('nom'),
//         'adresse'=> $request->input('adresse'),
//         'phone'=> $request->input('phone'),
//         'logo'=> $new_img,
//         'email' => $request->input('email'),
//         'web' => $request->input('web')
//
//        ]);
    $query = DB::table("universities")->insert([
        'nom'=> $request->input('nom'),
        'adresse'=> $request->input('adresse'),
        'phone'=> $request->input('phone'),
        'logo'=> $new_img,
        'email' => $request->input('email'),
        'web' => $request->input('web'),
        'created_at' => NOW()

    ]);
    if($query){
        $this->index();
        return back()->with("save","data saved");
    }
    else{
        $this->index();
        return back()->with("fail","error try again");
    }
        //return $request->input();

     //return response()->json(['success'=>'envoyer']);


    }
    public  function update(Request $request){
        $request->validate([
            'nom'=> 'required',
            'adresse'=> 'required',
            'phone'=> 'required|max:10',
            'image'=> 'required|image|max:2048',
            'email' => 'required|email'
        ]);
        $image = $request->file('image');
        $new_img = rand().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('img'),$new_img);


        $query = DB::table('universities')->where('id',$request->id)->update([
            'nom'=> $request->nom,
            'adresse'=> $request->adresse,
            'phone'=> $request->phone,
            'logo'=> $new_img,
            'email' => $request->email,
            'web' => $request->web,
            'updated_at' => NOW()
        ]);
        if($query){
            $this->index();
            return back()->with("update","data updated");
        }
        else{
            $this->index();
            return back()->with("fail","error try again");
        }

    }
    public function delete($id){
        $query = DB::table('universities')->where('id',$id)->delete();
        if($query){
            $this->index();
            return back()->with("delete","data deleted");
        }
        else{
            $this->index();
            return back()->with("fail","error try again");
        }
    }
    //
}
