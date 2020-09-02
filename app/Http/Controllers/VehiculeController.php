<?php

namespace App\Http\Controllers;

use App\Vehicule;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Categorie;

class VehiculeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicule = Vehicule::all();
        $cat= Categorie::all();
        return view('vehicules.index', ['vehicule' => $vehicule, 'cat' => $cat ]);
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
            "vehicule"=>"required",
            "couleur"=>"required",
            "matricule"=>"required|unique:vehicules",
            "categorie_id"=>"required|not_in:-1",
            "carburant"=>"required|not_in:-1",
            "nb_cyl"=>"required|not_in:-1",
            "puissance_fiscale"=>"required|not_in:-1",
            "nb_vit"=>"required|not_in:-1",
            "options"=>"required",
            "photo"=>"required|image|max:10240",
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
        ]);

        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $fileName = Str::random(30).'.'.$image->guessClientExtension();
            $image->move('upload/', $fileName);

            $vehicule->photo = $fileName;
        }

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
        $cat = Categorie::all();
        return view('vehicules.edit', ['vehicule' => $vehicule, 'cat' => $cat]);
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
        $image_name = $request->hidden_image;
        $image = $request->file('photo');
        if($image != ''){
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
                "photo"=>"image|max:10240",
                
            ]);
            $image_name = rand().'.'.$image->guessClientExtension();
            $image->move(public_path('upload/'), $image_name);

        }else{
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
            ]);

        }
        $form_data = array(
        'vehicule' => $request->vehicule,
        'couleur' => $request->couleur,
        'matricule' => $request->matricule,
        'categorie_id' => $request->categorie_id,
        'carburant' => $request->carburant,
        'nb_cyl' => $request->nb_cyl,
        'puissance_fiscale' => $request->puissance_fiscale,
        'nb_vit' => $request->nb_vit,
        'options' => $request->options,
        'status' => $request->status,
        'photo' => $image_name,
        );

        Vehicule::whereId($id)->update($form_data);
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
