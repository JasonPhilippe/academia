<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ControllerProfils extends Controller
{
    public function index(){
        $data = DB::table('universities')->get();
//        $profils = DB::table('profils')->get();
        $profils = DB::table('profils')
            ->join('universities','universities.id','=','profils.id_universite')
            ->select('profils.*','universities.nom')
            ->get();
        return view('admin.profils',compact('data','profils'));
    }
    public function save(Request $request){

        $request->validate([
            'username'=> 'required',
            'email'=>'required|email|unique:profils',
            'password'=>'required|min:6|max:20',
            'statuts'=> 'required',
            'universite'=> 'required'
        ]);

        $query = DB::table("profils")->insert([
            'username'=>$request->username,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'status'=>$request->statuts,
            'espace'=>'web',
            'id_universite'=>$request->universite,
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
    }
    public  function update(Request $request){


        $query = DB::table('profils')->where('id_profils',$request->id)->update([
            'intitule_promo'=> $request->nom,
            'id_departement'=> $request->departement,
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
        $query = DB::table('profils')->where('id_profils',$id)->delete();
        if($query){
            $this->index();
            return back()->with("delete","data deleted");
        }
        else{
            $this->index();
            return back()->with("fail","error try again");
        }
    }



}
