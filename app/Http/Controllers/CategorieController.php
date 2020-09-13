<?php

namespace App\Http\Controllers;

use App\Categorie;
use Illuminate\Http\Request;
use DB;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categorie::all();
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

        return view('categories.index', ['categories' => $categories, 'data' => $data, 'assurences' => $assurences, 'vidanges' => $vidanges, 'vignettes' => $vignettes, 'visites' => $visites, 'reparations' => $reparations]);
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
            'categorie'=> 'required|max:255',
        ]);

        $categorie = new Categorie([
            'categorie' => $request->get('categorie'),
            
        ]);

        $categorie->save();

        return redirect('/categories')->with('success', 'Ajout avec succes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categorie = Categorie::find($id);
        $categorie->delete();
        return redirect('/categories')->with('success', 'categorie supprimée!');
    }
}
