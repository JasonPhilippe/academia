<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ControllerCours extends Controller
{
    public function index(){

        $cours = DB::table('cours')
            ->join('professors','professors.id_professors','=','cours.id_professeur')
            ->join('promotions','promotions.id_promotion','=','cours.id_promotion')
            ->join('departements','departements.id_departement','=','promotions.id_departement')
            ->join('facultes','facultes.id_facultes','=','departements.id_facultes')
            ->select('professors.*','cours.*','promotions.*','departements.nom_departement','facultes.libelle')
            ->where('facultes.id_universite','=',Session::get('adminIdUniversite'))
            ->get();

        $professeurs = DB::table('professors')
            ->join('universities','universities.id','=','professors.id_universite')
            ->select('professors.*')
            ->where('universities.id','=',Session::get('adminIdUniversite'))
            ->get();

        $coursbyprofesseur = DB::table('cours')
            ->join('professors','professors.id_professors','=','cours.id_professeur')
            ->join('promotions','promotions.id_promotion','=','cours.id_promotion')
            ->join('departements','departements.id_departement','=','promotions.id_departement')
            ->join('facultes','facultes.id_facultes','=','departements.id_facultes')
            ->select('professors.*','cours.*','promotions.*','departements.nom_departement','facultes.libelle')
            ->where('facultes.id_universite','=',Session::get('adminIdUniversite'))
            ->where('cours.id_professeur',Session::get('adminIdProfessors'))
            ->get();

        $promotion = DB::table('promotions')
            ->join('departements','departements.id_departement','=','promotions.id_departement')
            ->join('facultes','facultes.id_facultes','=','departements.id_facultes')
            ->join('universities','universities.id','=','facultes.id_universite')
            ->select('departements.nom_departement','promotions.*','facultes.libelle')
            ->where('universities.id','=',Session::get('adminIdUniversite'))
            ->get();
//        printf($cours);
        return view('admin.cours',compact('cours','professeurs','promotion','coursbyprofesseur'));
    }
    public function save(Request $request){

        $request->validate([
            'professeur'=> 'required',
            'promotion'=> 'required',
            'intitule'=> 'required',
            'ponderation'=> 'required',
            'volume_heure'=> 'required'
        ]);


        $query = DB::table("cours")->insert([
            'id_professeur'=>$request->professeur,
            'id_promotion'=> $request->promotion,
            'intitule_cours'=> $request->intitule,
            'ponderation'=> $request->ponderation,
            'volume_heure'=> $request->volume_heure,
            'created_at' => NOW()]);

        if($query){
            $this->index();
            return back()->with("save","data saved");
        }
        else{
            $this->index();
            return back()->with("fail","error try again");
        }
    }
    public  function update(Request $request){


        $query = DB::table('departements')->where('id_departement',$request->id)->update([
            'nom_departement'=> $request->nom,
            'id_facultes'=> $request->faculte,
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
        $query = DB::table('cours')->where('id_cours',$id)->delete();
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
