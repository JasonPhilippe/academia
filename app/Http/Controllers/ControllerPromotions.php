<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControllerPromotions extends Controller
{
    public function index(){
        $data = DB::table('departements')->get();
        $promotions = DB::table('promotions')
            ->join('departements','departements.id_departement','=','promotions.id_departement')
            ->join('facultes','facultes.id_facultes','=','departements.id_facultes')
            ->get();
//        var_dump($data);
        return view('admin.promotion',compact('data','promotions'));
    }
    public function save(Request $request){

        $request->validate([
            'nom'=> 'required'
        ]);
        $nom = explode(",",$request->input('nom'));
        $departement = count($request->departement);
        $count = count($nom);
        for ($j=0;$j<$departement;$j++){
            for ($i=0;$i < $count;$i++){
                $query = DB::table("promotions")->insert([
                    'intitule_promo'=> ucfirst($nom[$i]),
                    'id_departement'=> $request->departement[$j],
                    'created_at' => NOW()

                ]);
            }
        }


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


        $query = DB::table('promotions')->where('id_promotion',$request->id)->update([
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
        $query = DB::table('promotions')->where('id_promotion',$id)->delete();
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
