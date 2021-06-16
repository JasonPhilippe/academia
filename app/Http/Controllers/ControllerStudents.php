<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ControllerStudents extends Controller
{
    public function index()
    {
        $cours = DB::table('cours')
            ->join('professors','professors.id_professors','=','cours.id_professeur')
            ->join('promotions','promotions.id_promotion','=','cours.id_promotion')
            ->join('departements','departements.id_departement','=','promotions.id_departement')
            ->join('facultes','facultes.id_facultes','=','departements.id_facultes')
            ->select('professors.*','cours.*','promotions.*','departements.nom_departement','facultes.libelle')
            ->where('facultes.id_facultes','=',Session::get('adminIdUniversite'))
            ->get();
        $departements = DB::table('departements')
            ->join('facultes','facultes.id_facultes','=','departements.id_facultes')
            ->get();

//        $cotes = DB::table('cours')
//            ->join('professors','professors.id_professors','=','cours.id_professeur')
//            ->join('promotions','promotions.id_promotion','=','cours.id_promotion')
//            ->join('departements','departements.id_departement','=','promotions.id_departement')
//            ->join('facultes','facultes.id_facultes','=','departements.id_facultes')
//            ->select('professors.*','cours.*','promotions.*','departements.nom_departement','facultes.libelle')
//            ->where('facultes.id_facultes','=',Session::get('adminIdUniversite'))
//            ->get();

        $etudiants = DB::table('students')
            ->join('universities','universities.id','=','students.id_universite')
            ->join('promotions','promotions.id_promotion','=','students.id_promotion')
            ->join('departements','departements.id_departement','=','students.id_dep')
            ->join('facultes','facultes.id_facultes','=','students.id_facultes')
            ->join('cours','cours.id_promotion','=','promotions.id_promotion')
            ->select('students.*','promotions.*','departements.*','facultes.*','cours.*')
            ->where('universities.id','=',Session::get('adminIdUniversite'))
            ->get();

//        printf($etudiants);
        return view('admin.students',compact('cours','etudiants','departements'));
    }
    public function save(Request $request){

        $request->validate([
            'mention'=> 'required',
            'id_cours'=> 'required',
            'id_etudiant'=> 'required',
            'delib_session'=> 'required'
        ]);


        $query = DB::table("cotes")->insert([
            'id_cours'=> $request->id_cours,
            'id_etudiant'=> $request->id_etudiant,
            'mention'=>$request->mention,
            'delib_session'=> $request->delib_session,
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


        $query = DB::table('cotes')->where('id_cote',$request->id)->update([
            'mention'=> $request->nom,
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
        $query = DB::table('cotes')->where('id_cote',$id)->delete();
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
