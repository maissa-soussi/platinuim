<?php

namespace App\Http\Controllers;

use App\Vehicule;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Categorie;
use DB;

class VehiculeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicule = Vehicule::all()->sortBy('vehicule');;
        $cat= Categorie::all();
        $now = date('Y-m-d');
        $assurences = DB::table('vehicules')->where('assurences', 'like', '%'.$now.'%');
        $assurences = $assurences->get();
        $vidanges = DB::table('vehicules')->where('vidanges', 'like', '%'.$now.'%');
        $vidanges = $vidanges->get();
        $vignettes = DB::table('vehicules')->where('vignettes', 'like', '%'.$now.'%');
        $vignettes = $vignettes->get();
        $visites = DB::table('vehicules')->where('visites_tech', 'like', '%'.$now.'%');
        $visites = $visites->get();
        $reparations = DB::table('vehicules')->where('repdate', 'like', '%'.$now.'%');
        $reparations = $reparations->get();

        $nbassurences = DB::table('vehicules')->where('assurences', 'like', '%'.$now.'%')->count();
        $nbvidanges = DB::table('vehicules')->where('vidanges', 'like', '%'.$now.'%')->count();
        $nbvignettes = DB::table('vehicules')->where('vignettes', 'like', '%'.$now.'%')->count();
        $nbvisites = DB::table('vehicules')->where('visites_tech', 'like', '%'.$now.'%')->count();
        $nbreparations = DB::table('vehicules')->where('repdate', 'like', '%'.$now.'%')->count();
        $nbnotif = $nbassurences + $nbvidanges + $nbvignettes + $nbvisites + $nbreparations;

        $data = array(
            'nbnotif' => $nbnotif,

        );
        return view('vehicules.index', ['vehicule' => $vehicule, 'cat' => $cat, 'data' => $data, 'assurences' => $assurences, 'vidanges' => $vidanges, 'vignettes' => $vignettes, 'visites' => $visites, 'reparations' => $reparations ]);
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
            "prix"=>"required",
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
            'prix' => $request->get('prix'),
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
        $now = date('Y-m-d');
        $assurences = DB::table('vehicules')->where('assurences', 'like', '%'.$now.'%');
        $assurences = $assurences->get();
        $vidanges = DB::table('vehicules')->where('vidanges', 'like', '%'.$now.'%');
        $vidanges = $vidanges->get();
        $vignettes = DB::table('vehicules')->where('vignettes', 'like', '%'.$now.'%');
        $vignettes = $vignettes->get();
        $visites = DB::table('vehicules')->where('visites_tech', 'like', '%'.$now.'%');
        $visites = $visites->get();
        $reparations = DB::table('vehicules')->where('repdate', 'like', '%'.$now.'%');
        $reparations = $reparations->get();

        $nbassurences = DB::table('vehicules')->where('assurences', 'like', '%'.$now.'%')->count();
        $nbvidanges = DB::table('vehicules')->where('vidanges', 'like', '%'.$now.'%')->count();
        $nbvignettes = DB::table('vehicules')->where('vignettes', 'like', '%'.$now.'%')->count();
        $nbvisites = DB::table('vehicules')->where('visites_tech', 'like', '%'.$now.'%')->count();
        $nbreparations = DB::table('vehicules')->where('repdate', 'like', '%'.$now.'%')->count();
        $nbnotif = $nbassurences + $nbvidanges + $nbvignettes + $nbvisites + $nbreparations;

        $data = array(
            'nbnotif' => $nbnotif,

        );

        return view('vehicules.show', ['vehicule' => $vehicule, 'data' => $data, 'assurences' => $assurences, 'vidanges' => $vidanges, 'vignettes' => $vignettes, 'visites' => $visites, 'reparations' => $reparations ]);
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
        $now = date('Y-m-d');
        $assurences = DB::table('vehicules')->where('assurences', 'like', '%'.$now.'%');
        $assurences = $assurences->get();
        $vidanges = DB::table('vehicules')->where('vidanges', 'like', '%'.$now.'%');
        $vidanges = $vidanges->get();
        $vignettes = DB::table('vehicules')->where('vignettes', 'like', '%'.$now.'%');
        $vignettes = $vignettes->get();
        $visites = DB::table('vehicules')->where('visites_tech', 'like', '%'.$now.'%');
        $visites = $visites->get();
        $reparations = DB::table('vehicules')->where('repdate', 'like', '%'.$now.'%');
        $reparations = $reparations->get();

        $nbassurences = DB::table('vehicules')->where('assurences', 'like', '%'.$now.'%')->count();
        $nbvidanges = DB::table('vehicules')->where('vidanges', 'like', '%'.$now.'%')->count();
        $nbvignettes = DB::table('vehicules')->where('vignettes', 'like', '%'.$now.'%')->count();
        $nbvisites = DB::table('vehicules')->where('visites_tech', 'like', '%'.$now.'%')->count();
        $nbreparations = DB::table('vehicules')->where('repdate', 'like', '%'.$now.'%')->count();
        $nbnotif = $nbassurences + $nbvidanges + $nbvignettes + $nbvisites + $nbreparations;

        $data = array(
            'nbnotif' => $nbnotif,

        );
        return view('vehicules.edit', ['vehicule' => $vehicule, 'cat' => $cat, 'data' => $data, 'assurences' => $assurences, 'vidanges' => $vidanges, 'vignettes' => $vignettes, 'visites' => $visites, 'reparations' => $reparations ]);
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
                "prix"=>"required",
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
                "prix"=>"required",              
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
        'prix' => $request->prix,
        'photo' => $image_name,
        'reparations' => $request->reparations,
        'repdate' => $request->repdate,
        'visites_tech' => $request->visites_tech,
        'vidanges' => $request->vidanges,
        'vignettes' => $request->vignettes,
        'assurences' => $request->assurences,
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
