<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reservation;
use App\Client;
use App\Vehicule;
use DB;
use \PDF;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use Carbon\Carbon;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservations = Reservation::all()->sortByDesc('updated_at');
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

        return view('reservations.index',  ['reservations' => $reservations, 'data' => $data, 'assurences' => $assurences, 'vidanges' => $vidanges, 'vignettes' => $vignettes, 'visites' => $visites, 'reparations' => $reparations]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reservation = Reservation::find($id);
        $vehicule = DB::table('vehicules')->where(['matricule'=>$reservation->imma_v])->first();
        $client = DB::table('clients')->where(['cin'=>$reservation->cinclient])->first();
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
        return view('reservations.show', ['vehicule' => $vehicule, 'client' => $client, 'reservation' => $reservation, 'data' => $data, 'assurences' => $assurences, 'vidanges' => $vidanges, 'vignettes' => $vignettes, 'visites' => $visites, 'reparations' => $reparations]);
    }

    public function planning()
    {   
        $vehicule = Vehicule::all();
        $reservations = Reservation::all();
        foreach($reservations as $reservation){
        $reservation->date_fin = Carbon::parse($reservation->date_fin)->addDays(1);
        $reservation->date_fin = Carbon::parse($reservation->date_fin)->format('Y-m-d');
         }
        $fin = $reservations->get('date_fin');
        $fin = Carbon::parse($fin)->addDays(1);
        $fin = Carbon::parse($fin)->format('Y-m-d');
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
        return view('reservations.planning',  ['vehicule' => $vehicule, 'reservations' => $reservations, 'data' => $data, 'assurences' => $assurences, 'vidanges' => $vidanges, 'vignettes' => $vignettes, 'visites' => $visites, 'reparations' => $reparations]);
    }

    public function search(Request $request){
        $vehicule = Vehicule::all();
        $search = $request->get('search');
        $reservations = DB::table('reservations')->where('imma_v', 'like', '%'.$search.'%');
        $reservations = $reservations->get();
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
        return view('reservations.planning', ['vehicule' => $vehicule, 'reservations' => $reservations, 'data' => $data, 'assurences' => $assurences, 'vidanges' => $vidanges, 'vignettes' => $vignettes, 'visites' => $visites, 'reparations' => $reparations]);
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
            "cinclient"=>"required",
            "imma_v"=>"required",
            "date_deb"=>"required",
            "date_fin"=>"required",
            "paiement"=>"required|not_in:-1",
        ]);

        $testclient = DB::table('clients')
        ->where('cin', 'like', '%'.$request->get('cinclient').'%')
        ->count();

        $testvehicule = DB::table('vehicules')
        ->where('matricule', 'like', '%'.$request->get('imma_v').'%')
        ->count();

        $souslocation = DB::table('reservations')
         ->where('imma_v', 'like', '%'.$request->get('imma_v').'%')
         ->whereBetween('reservations.date_deb', [$request->get('date_deb'),$request->get('date_fin')])
         ->orwhereBetween('reservations.date_fin', [$request->get('date_deb'),$request->get('date_fin')])
         ->count();
         if($souslocation > 0){
            return redirect('planning')->with('success', 'vehicule non disponible!');

         }
         elseif($testclient == 0){
            return redirect('planning')->with('success', 'CIN non valide!');
         }
         elseif($testvehicule == 0){
            return redirect('planning')->with('success', 'matricule non valide!');
         }
         else{

        $imma=$request->get('imma_v');
        $cinc=$request->get('cinclient');
        $vehicules = DB::table('vehicules')->where(['matricule'=>$imma])->first();
        $clients = DB::table('clients')->where(['cin'=>$cinc])->first();
        $date1 = strtotime($request->get('date_deb'));
        $date2 = strtotime($request->get('date_fin'));
        
        $nbJoursTimestamp = $date2 - $date1;
        $nbJours = $nbJoursTimestamp/86400+1;
        $pr=$nbJours * $vehicules->prix;
        $reservation = new Reservation([
            'cinclient' => $request->get('cinclient'),
            'imma_v' => $request->get('imma_v'),
            'date_deb' => $request->get('date_deb'),
            'date_fin' => $request->get('date_fin'),
            'montant' => $pr,
            'paiement' => $request->get('paiement'),
            
        ]);
        $data = array(
            'cinclient' => $request->get('cinclient'),
            'imma_v' => $request->get('imma_v'),
            'date_deb' => $request->get('date_deb'),
            'date_fin' => $request->get('date_fin'),
            'montant' => $pr,
            'paiement' => $request->get('paiement'),
            'nom' => $clients->nom,
            'email' => $clients->email,
            'phone_nb' => $clients->phone_nb,
            'adresse' => $clients->adresse,
            'matricule' => $vehicules->matricule,
            'vehicule' => $vehicules->vehicule,
            'couleur' => $vehicules->couleur,
            'prix' => $vehicules->prix,

        );

        $reservation->save();
        return redirect('planning')->with('success', 'Ajout avec succes!');
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reservation = Reservation::find($id);
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

        return view('reservations.edit',  ['reservation' => $reservation, 'data' => $data, 'assurences' => $assurences, 'vidanges' => $vidanges, 'vignettes' => $vignettes, 'visites' => $visites, 'reparations' => $reparations]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            "cinclient"=>"required",
            "imma_v"=>"required",
            "date_deb"=>"required",
            "date_fin"=>"required",
            "paiement"=>"required",
            "recuperation"=>"required",

        ]);

        $imma=$request->get('imma_v');
        $vehicules = DB::table('vehicules')->where(['matricule'=>$imma])->first();
        $date1 = strtotime($request->get('date_deb'));
        $date2 = strtotime($request->get('date_fin'));
        
        $nbJoursTimestamp = $date2 - $date1;
        $nbJours = $nbJoursTimestamp/86400+1;
        $pr=$nbJours * $vehicules->prix;
        $reservation = Reservation::find($id);
        $reservation->cinclient = $request->get('cinclient');
        $reservation->imma_v = $request->get('imma_v');
        $reservation->date_deb = $request->get('date_deb');
        $reservation->date_fin = $request->get('date_fin');
        $reservation->paiement = $request->get('paiement');
        $reservation->recuperation = $request->get('recuperation');
        $reservation->montant = $pr;
        $reservation->save();

        return redirect('/reservations')->with('success', 'Modification avec succes!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reservation = Reservation::find($id);
        $reservation->delete();

        return redirect('/reservations')->with('success', 'Réservation supprimée!');
    }

    public function fun_pdf()
    {
        $pdf = \PDF::loadView('reservations.show');
        return $pdf->download('show.pdf');
    }
}
