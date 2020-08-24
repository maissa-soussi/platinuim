<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Datatables;
use Validator;
use URL;

class ClientController extends Controller
{
    

    public function Clients(){
        return view("views.client");
    }

    public function ListeClients(){

        $clients = Client::query();
        return Datatables::of($clients)
        ->editColumn("action_btns",function($clients){
            return '<a href="'.URL::to('/edit-client/'.$clients->id).'" class="btn btn-info client-edit" data-id="'.$clients->id.'">Modifier</a> 
            <a href="javascript:void(0)" class="btn btn-danger client-delete" data-id="'.$clients->id.'">Supprimer</a>';
        })

        ->editColumn("status",function($clients){
            if($clients->status){
                return '<button class="btn btn-success">F</button>';

            }else{
                return '<button class="btn btn-dark">N</button>';

            }
        })
        ->rawColumns(["action_btns","status"])
        ->make(true);
    }

    public function saveClient(Request $request){
        $validator = Validator::make(array(
            "client_name"=>$request->client_name,
            "date_nais"=>$request->date_nais,
            "tel"=>$request->tel,
            "cin"=>$request->cin,
            "num_permis"=>$request->permis,
            "email"=>$request->email,
            "adress"=>$request->adress,
        ),array(
            "client_name"=>"required",
            "date_nais"=>"required",
            "tel"=>"required",
            "cin"=>"required|unique:clients",
            "num_permis"=>"required|unique:clients",
            "email"=>"required|unique:clients",
            "adress"=>"required",
        ));

        if($validator->fails()){
            return redirect("client")->withErrors($validator)->withInput();

        }else{
            $client = new client;
            $client->nom = $request->client_name;
            $client->date_nais = $request->date_nais;
            $client->phone_nb = $request->tel;
            $client->cin = $request->cin;
            $client->num_permis = $request->permis;
            $client->email = $request->email;
            $client->adresse = $request->adress;
            $client->save();
            $request->session()->flash("message","ajout d'un nouveau client");
            return redirect("client");
             
        }
    }

    public function deleteClient(Request $request){
        $id = $request->delete_id;
        $client_data = Client::find($id);
        if(isset($client_data->id)){
            $client_data->delete();
            echo json_encode(array("message"=>"client supprimée"));
        }else{
            echo json_encode(array("message"=>"client n'existe pas"));
        }
        die();
    }

    public function editClient($id = null){
        $client = Client::find($id);
        return view("views.edit-client",["client"=>$client]);
    }

    public function editsaveClient(Request $request){
        $client_id = $request->client_id;
        $client = Client::find($client_id);
        $client->nom = $request->client_name;
        $client->date_nais = $request->date_nais;
        $client->phone_nb = $request->tel;
        $client->cin = $request->cin;
        $client->num_permis = $request->permis;
        $client->email = $request->email;
        $client->status = $request->c_status;
        $client->adresse = $request->adress;
            $client->save();
            $request->session()->flash("message","modification");
            return redirect("client");
    }
}