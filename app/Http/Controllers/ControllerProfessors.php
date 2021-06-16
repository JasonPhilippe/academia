<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ControllerProfessors extends Controller
{
    public function index(){
        $data = DB::table('professors')
            ->join('universities','universities.id','=','professors.id_universite')
            ->select('professors.*')
            ->where('universities.id','=',Session::get('adminIdUniversite'))
            ->get();
        return view('admin.professors',compact('data'));
    }
    public function save(Request $request){

        $request->validate([
            'matricule'=> 'required|unique:professors',
            'nom'=> 'required',
            'postnom'=> 'required',
            'prenom'=> 'required',
            'sexe'=> 'required',
            'type'=> 'required',
        ]);

        $query = DB::table("professors")->insert([
            'matricule'=>$request->matricule,
            'nom_prof'=> $request->nom,
            'postnom_prof'=> $request->postnom,
            'prenom_prof'=> $request->prenom,
            'sexe_prof'=> $request->sexe,
            'type_professeur'=> $request->type,
            'id_universite'=>$request->university,
            'created_at' => NOW()]);


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


        $query = DB::table('professors')->where('id_professors',$request->id)->update([
            'matricule'=>$request->matricule,
            'nom_prof'=> $request->nom,
            'postnom_prof'=> $request->postnom,
            'prenom_prof'=> $request->prenom,
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
        $query = DB::table('professors')->where('id_professors',$id)->delete();
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
