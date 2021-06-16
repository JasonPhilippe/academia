<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControllerDepartement extends Controller
{
    public function index(){
        $data = DB::table('facultes')->get();
        $departements = DB::table('departements')
            ->join('facultes','facultes.id_facultes','=','departements.id_facultes')
            ->get();
//        var_dump($data);
        return view('admin.departements',compact('data','departements'));
    }
    public function save(Request $request){

        $request->validate([
            'nom'=> 'required'
        ]);
        $nom = explode(",",$request->input('nom'));
        $count = count($nom);
        for ($i=0;$i < $count;$i++){
            $query = DB::table("departements")->insert([
                'nom_departement'=> ucfirst($nom[$i]),
                'id_facultes'=> $request->university,
                'created_at' => NOW()

            ]);
        }

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
        $query = DB::table('departements')->where('id_departement',$id)->delete();
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
