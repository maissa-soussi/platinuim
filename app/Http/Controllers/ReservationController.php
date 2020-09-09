<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reservation;
use App\Client;
use App\Vehicule;
use DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

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

        return view('reservations.index', compact('reservations'));

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
        return view('reservations.show', ['vehicule' => $vehicule, 'client' => $client, 'reservation' => $reservation]);
    }

    public function planning()
    {   
        $reservations = Reservation::all();
        return view('reservations.planning', compact('reservations'));
    }

    public function search(Request $request){
        $search = $request->get('search');
        $reservations = DB::table('reservations')->where('imma_v', 'like', '%'.$search.'%');
        $reservations = $reservations->get();
        return view('reservations.planning', ['reservations' => $reservations]);
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
        //Mail::to($clients->email)->send(new SendMail($data));
        return redirect('planning')->with('success', 'Ajout avec succes!');
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

        return view('reservations.edit', compact('reservation'));
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
}
