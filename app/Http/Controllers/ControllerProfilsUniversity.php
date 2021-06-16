<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ControllerProfilsUniversity extends Controller
{
    public function index(){
        $profils = DB::table('profils')
                        ->join('universities','universities.id','=','profils.id_universite')
                        ->select('profils.*')
                        ->where('profils.status','professeurs')
                        ->orwhere('profils.status','president-jury')
                        ->where('universities.id','=',Session::get('adminIdUniversite'))
                        ->get();

        $professeur = DB::table('professors')
            ->join('universities','universities.id','=','professors.id_universite')
            ->select('professors.*')
            ->where('universities.id','=',Session::get('adminIdUniversite'))
            ->get();
        return view('admin.profils_univ',compact('professeur','profils'));
    }
    public function save(Request $request){

        $request->validate([
            'username'=> 'required',
            'email'=>'required|email|unique:profils',
            'password'=>'required|min:6|max:20',
            'statuts'=> 'required',
            'universite'=> 'required'
        ]);
        $username = explode("/",$request->username);

        $query = DB::table("profils")->insert([
            'username'=>$username[1],
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'status'=>$request->statuts,
            'espace'=>'web',
            'id_universite'=>$request->universite,
            'id_professeurs' =>$username[0],
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
