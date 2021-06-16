<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControllerFacultes extends Controller
{
    public function index(){
        $data = DB::table('universities')->get();
        $faculte = DB::table('facultes')
                     ->join('universities','universities.id','=','facultes.id_universite')
                     ->get();
//        var_dump($data);
        return view('admin.facultes',compact('data','faculte'));
    }
    public function save(Request $request){

        $request->validate([
            'nom'=> 'required'
        ]);
        $nom = explode(",",$request->input('nom'));
        $count = count($nom);
        for ($i=0;$i < $count;$i++){
            $query = DB::table("facultes")->insert([
                'libelle'=> ucfirst($nom[$i]),
                'id_universite'=> $request->university,
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


        $query = DB::table('facultes')->where('id_facultes',$request->id)->update([
            'libelle'=> $request->nom,
            'id_facultes'=> $request->university,
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
        $query = DB::table('facultes')->where('id_facultes',$id)->delete();
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
    public function getUniversity(){
        $data = DB::table('facultes')->get();
//        var_dump($data);
        return view('admin.facultes',compact('data'));
    }
}
