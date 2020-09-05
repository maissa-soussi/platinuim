<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reservation;
use DB;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservations = Reservation::all();

        return view('reservations.index', compact('reservations'));

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

    public function planning()
    {
        $reservation = Reservation::all();

        return view('reservations.planning');
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
        $vehicules = DB::table('vehicules')->where(['matricule'=>$imma])->first();
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

        $reservation->save();

        return redirect('planning')->with('success', 'Ajout avec succes!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

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

        $reservation = Reservation::find($id);
        $reservation->cinclient = $request->get('cinclient');
        $reservation->imma_v = $request->get('imma_v');
        $reservation->date_deb = $request->get('date_deb');
        $reservation->date_fin = $request->get('date_fin');
        $reservation->paiement = $request->get('paiement');
        $reservation->recuperation = $request->get('recuperation');
        $vehicules = DB::table('vehicules')->where(['matricule'=>$imma_v])->first();
        $date1 = strtotime($reservation->date_deb);
        $date2 = strtotime($reservation->date_fin);
        
        $nbJoursTimestamp = $date2 - $date1;
        $nbJours = $nbJoursTimestamp/86400+1;
        $pr=$nbJours * $vehicules->prix;
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
