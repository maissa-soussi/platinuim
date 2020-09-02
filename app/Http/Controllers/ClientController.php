<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::all();

        return view('clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "nom"=>"required",
            "date_nais"=>"required",
            "phone_nb"=>"required",
            "cin"=>"required|unique:clients",
            "num_permis"=>"required|unique:clients",
            "email"=>"required|unique:clients",
            "adresse"=>"required",
        ]);

        $client = new Client([
            'nom' => $request->get('nom'),
            'date_nais' => $request->get('date_nais'),
            'phone_nb' => $request->get('phone_nb'),
            'cin' => $request->get('cin'),
            'num_permis' => $request->get('num_permis'),
            'email' => $request->get('email'),
            'adresse' => $request->get('adresse'),
        ]);

        $client->save();

        return redirect('/clients')->with('success', 'Ajout avec succes!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = Client::find($id);

        return view('clients.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Client::find($id);

        return view('clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            "nom"=>"required",
            "date_nais"=>"required",
            "phone_nb"=>"required",
            "cin"=>"required",
            "num_permis"=>"required",
            "email"=>"required",
            "adresse"=>"required",
            "status"=>"required",
        ]);

        $client = Client::find($id);
        $client->nom = $request->get('nom');
        $client->date_nais = $request->get('date_nais');
        $client->phone_nb = $request->get('phone_nb');
        $client->cin = $request->get('cin');
        $client->num_permis = $request->get('num_permis');
        $client->email = $request->get('email');
        $client->adresse = $request->get('adresse');
        $client->status = $request->get('status');
        $client->save();

        return redirect('/clients')->with('success', 'Modification avec succes!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Client::find($id);
        $client->delete();

        return redirect('/clients')->with('success', 'Client supprimé!');
    }

    
}
