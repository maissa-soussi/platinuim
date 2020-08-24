<?php

namespace App\Http\Controllers;

use App\Models\Vehicule;
use Illuminate\Http\Request;
use Datatables;
use DB;
use App\Models\Categorie;
use Validator;
use URL;

class VehiculeController extends Controller
{
    

    public function Vehicules(){
        
        $all_categories = Categorie::get();
        return view("views.vehicule",["categories"=>$all_categories]);
    }

    public function ListeVehicules(){

        $vehicules_query = DB::table("vehicules as vehicule")
        ->select("vehicule.*","categorie.categorie")
        ->leftJoin("categories as categorie","vehicule.categorie_id","=","categorie.id")
        ->get();
        return Datatables::of($vehicules_query)
        ->editColumn("photo", function($vehicules_query) {

            return '<img src="'.$vehicules_query->photo.'" style="height:100px;width:100px;"/>';
        })
        ->editColumn("action_btns",function($vehicules_query){
            return '<a href="'.URL::to('/edit-vehicule/'.$vehicules_query->id).'" class="btn btn-info vehicule-edit" data-id="'.$vehicules_query->id.'">Modifier</a> 
            <a href="javascript:void(0)" class="btn btn-danger vehicule-delete" data-id="'.$vehicules_query->id.'">Supprimer</a>';
        })
        ->editColumn("status",function($vehicules_query){
            if($vehicules_query->status){
                return '<button class="btn btn-success">Disponible</button>';

            }else{
                return '<button class="btn btn-danger">Sous location</button>';

            }
        })
        ->rawColumns(["action_btns","status"])
        ->make(true);
    }

    public function saveVehicule(Request $request){
        $validator = Validator::make(array(
            "vehicule_name"=>$request->vehicule_name,
            "color"=>$request->color,
            "matricule"=>$request->mat,
            "photo"=>$request->photo,
            "v_categ"=>$request->v_categ,
            "carb"=>$request->carb,
            "cyl"=>$request->cyl,
            "puissance"=>$request->puissance,
            "vitesse"=>$request->vitesse,
            "option"=>$request->option,
        ),array(
            "vehicule_name"=>"required",
            "color"=>"required",
            "matricule"=>"required|unique:vehicules",
            "v_categ"=>"required|not_in:-1",
            "carb"=>"required|not_in:-1",
            "cyl"=>"required|not_in:-1",
            "puissance"=>"required|not_in:-1",
            "vitesse"=>"required|not_in:-1",
            "option"=>"required",
        ));

        if($validator->fails()){
            return redirect("vehicule")->withErrors($validator)->withInput();

        }else{
            $vehicule = new vehicule;
            $vehicule->vehicule = $request->vehicule_name;
            $vehicule->couleur = $request->color;
            $vehicule->matricule = $request->mat;
            $vehicule->photo = $request->photo;
            $vehicule->categorie_id = $request->v_categ;
            $vehicule->carburant = $request->carb;
            $vehicule->nb_cyl = $request->cyl;
            $vehicule->puissance_fiscale = $request->puissance;
            $vehicule->nb_vit = $request->vitesse;
            $vehicule->options = $request->option;
            $vehicule->save();
            $request->session()->flash("message","ajout d'un nouveau véhicule");
            return redirect("vehicule");
             
        }
    }

    public function deleteVehicule(Request $request){
        $id = $request->delete_id;
        $vehicule_data = Vehicule::find($id);
        if(isset($vehicule_data->id)){
            $vehicule_data->delete();
            echo json_encode(array("message"=>"vehicule supprimée"));
        }else{
            echo json_encode(array("message"=>"vehicule n'existe pas"));
        }
        die();
    }

    public function editVehicule($id = null){
        $all_categories = Categorie::get();
        $vehicule_data = Vehicule::find($id);
        return view("views.edit-vehicule", ["categories"=>$all_categories, "vehicule_data"=>$vehicule_data]);
    }

    public function editsaveVehicule(Request $request){
        $vehicule_id = $request->vehicule_id;
        $vehicule = Vehicule::find($vehicule_id);
        $vehicule->vehicule = $request->vehicule_name;
        $vehicule->couleur = $request->color;
        $vehicule->matricule = $request->mat;
        $vehicule->photo = $request->photo;
        $vehicule->categorie_id = $request->v_categ;
        $vehicule->carburant = $request->carb;
        $vehicule->nb_cyl = $request->cyl;
        $vehicule->puissance_fiscale = $request->puissance;
        $vehicule->nb_vit = $request->vitesse;
        $vehicule->status = $request->v_status;
        $vehicule->options = $request->option;
            $vehicule->save();
            $request->session()->flash("message","modification");
            return redirect("vehicule");
    }
}
