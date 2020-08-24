<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use Datatables;
use Validator;
use URL;

class CategorieController extends Controller
{
    public function Categories(){
        return view("views.categorie");
    }

    public function ListeCategories(){

        $categories = Categorie::query();
        return Datatables::of($categories)
        ->editColumn("action_btns",function($categories){
            return '<a href="'.URL::to('/edit-categorie/'.$categories->id).'" class="btn btn-info categorie-edit" data-id="'.$categories->id.'">Modifier</a> 
            <a href="javascript:void(0)" class="btn btn-danger categorie-delete" data-id="'.$categories->id.'">Supprimer</a>';
        })
        ->rawColumns(["action_btns"])
        ->make(true);

        
    }

    public function saveCategorie(Request $request){
        $validator = Validator::make(array(
            "categorie"=>$request->categ_name
        ),array(
            "categorie"=>"required|unique:categories"
        ));

        if($validator->fails()){
            return redirect("categorie")->withErrors($validator)->withInput();

        }else{
            $categorie = new Categorie;
            $categorie->categorie = $request->categ_name;
            $categorie->save();
            $request->session()->flash("message","creation d'une nouvelle categorie");
            return redirect("categorie");
             
        }
    }

    public function deleteCategorie(Request $request){
        $id = $request->delete_id;
        $categorie_data = Categorie::find($id);
        if(isset($categorie_data->id)){
            $categorie_data->delete();
            echo json_encode(array("message"=>"categorie supprimée"));
        }else{
            echo json_encode(array("message"=>"categorie n'existe pas"));
        }
        die();
    }

    public function editCategorie($id = null){
        $categorie = Categorie::find($id);
        return view("views.edit-categorie",["categorie"=>$categorie]);
    }


    public function editsaveCategorie(Request $request){
        $update_id = $request->update_id;
        $categorie = Categorie::find($update_id);
            $categorie->categorie = $request->categ_name;
            $categorie->save();
            $request->session()->flash("message","modification");
            return redirect("categorie");
    }

}
