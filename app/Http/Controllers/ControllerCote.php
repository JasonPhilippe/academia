<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ControllerCote extends Controller
{
    public function index()
    {

        $cotes = DB::table('cotes')
            ->join('cours','cours.id_cours','cotes.id_cours')
            ->join('students','students.id_et','=','cotes.id_etudiant')
            ->select('cotes.*','cours.*','students.*')
            ->where('cours.id_professeur',Session::get('adminIdProfessors'))
            ->where('students.id_universite',Session::get('adminIdUniversite'))
            ->get();



        $promotionbyprofessor = DB::table('promotions')
            ->join('departements','departements.id_departement','=','promotions.id_departement')
            ->join('facultes','facultes.id_facultes','=','departements.id_facultes')
            ->join('cours','cours.id_promotion','=','promotions.id_promotion')
            ->select('promotions.*','departements.*')
            ->where('facultes.id_facultes',Session::get('adminIdUniversite'))
            ->where('cours.id_professeur',Session::get('adminIdProfessors'))
            ->distinct()
            ->get();

        //printf($promotionbyprofessor);
        return view('admin.cotes',compact('cotes','promotionbyprofessor'));
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
    public  function getstudentbypromotion(Request $request){

        $etudiants = DB::table('students')
            ->join('universities','universities.id','=','students.id_universite')
            ->join('facultes','facultes.id_facultes','=','students.id_facultes')
            ->join('departements','departements.id_departement','=','students.id_dep')
            ->join('promotions','promotions.id_promotion','=','students.id_promotion')
            ->select('students.*','promotions.*')
            ->where('universities.id','=',Session::get('adminIdUniversite'))
            ->where('promotions.id_promotion',$request->id_promotion)
            ->get();
        //printf($etudiants);

//        return view('admin.cotes',compact('etudiants','promotionbyprofessor','cours','cotes'));
        return response()->json($etudiants);
    }
    public  function  getcoursebypromo(Request $request){
        $cours = DB::table('cours')
            ->join('professors','professors.id_professors','=','cours.id_professeur')
            ->join('promotions','promotions.id_promotion','=','cours.id_promotion')
            ->join('departements','departements.id_departement','=','promotions.id_departement')
            ->join('facultes','facultes.id_facultes','=','departements.id_facultes')
            ->select('professors.*','cours.*','promotions.*','departements.nom_departement','facultes.libelle')
            ->where('facultes.id_facultes',Session::get('adminIdUniversite'))
            ->where('cours.id_professeur',Session::get('adminIdProfessors'))
            ->where('promotions.id_promotion',$request->id_promotion)
            ->get();
//        return response()->json($cours);
        return json_encode($cours);
    }

}
