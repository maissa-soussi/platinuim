<?php

namespace App\Http\Controllers;

use App\Vehicule;
use Illuminate\Http\Request;

class VehiculeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicules = Vehicule::all();
        
        return view('vehicules.index', compact('vehicules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vehicules.create');
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
            "vehicule"=>"required",
            "couleur"=>"required",
            "matricule"=>"required|unique:vehicules",
            "categorie_id"=>"required|not_in:-1",
            "carburant"=>"required|not_in:-1",
            "nb_cyl"=>"required|not_in:-1",
            "puissance_fiscale"=>"required|not_in:-1",
            "nb_vit"=>"required|not_in:-1",
            "options"=>"required",
            "photo"=>"required",
        ]);

        $vehicule = new Vehicule([
            'vehicule' => $request->get('vehicule'),
            'couleur' => $request->get('couleur'),
            'matricule' => $request->get('matricule'),
            'categorie_id' => $request->get('categorie_id'),
            'carburant' => $request->get('carburant'),
            'nb_cyl' => $request->get('nb_cyl'),
            'puissance_fiscale' => $request->get('puissance_fiscale'),
            'nb_vit' => $request->get('nb_vit'),
            'options' => $request->get('options'),
            'photo' => $request->get('photo'),
        ]);

        $vehicule->save();

        return redirect('/vehicules')->with('success', 'Ajout avec succes!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vehicule  $vehicule
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vehicule = Vehicule::find($id);

        return view('vehicules.show', compact('vehicule'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vehicule  $vehicule
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vehicule = Vehicule::find($id);

        return view('vehicules.edit', compact('vehicule'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vehicule  $vehicule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            "vehicule"=>"required",
            "couleur"=>"required",
            "matricule"=>"required",
            "categorie_id"=>"required|not_in:-1",
            "carburant"=>"required|not_in:-1",
            "nb_cyl"=>"required|not_in:-1",
            "puissance_fiscale"=>"required|not_in:-1",
            "nb_vit"=>"required|not_in:-1",
            "options"=>"required",
            "status"=>"required",
            "photo"=>"required",
            
        ]);

        $vehicule = Vehicule::find($id);
        $vehicule->vehicule = $request->get('vehicule');
        $vehicule->couleur = $request->get('couleur');
        $vehicule->matricule = $request->get('matricule');
        $vehicule->categorie_id = $request->get('categorie_id');
        $vehicule->carburant = $request->get('carburant');
        $vehicule->nb_cyl = $request->get('nb_cyl');
        $vehicule->puissance_fiscale = $request->get('puissance_fiscale');
        $vehicule->nb_vit = $request->get('nb_vit');
        $vehicule->options = $request->get('options');
        $vehicule->status = $request->get('status');
        $vehicule->photo = $request->get('photo');
        $vehicule->save();

        return redirect('/vehicules')->with('success', 'Modification avec succes!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vehicule  $vehicule
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vehicule = Vehicule::find($id);
        $vehicule->delete();

        return redirect('/vehicules')->with('success', 'vehicule supprimé aves succes!');
    }
}
