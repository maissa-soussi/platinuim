<?php

namespace App\Http\Controllers;
use App\Vehicule;
use App\Client;
use App\Reservation;
use DB;

use Illuminate\Http\Request;

class AdminHomeController extends Controller
{
    public function dashboard() {
        $vehicules = Vehicule::count();
        $souslocation = DB::table('reservations')->where('recuperation', 'like', 0)->count();
        $clients = Client::count();
        $reservations = Reservation::count();
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
            'vehicules' => $vehicules,
            'clients' => $clients,
            'reservations' => $reservations,
            'souslocation' => $souslocation,
            'nbnotif' => $nbnotif,

        );
        return view('views.dashboard', ['data' => $data, 'assurences' => $assurences, 'vidanges' => $vidanges, 'vignettes' => $vignettes, 'visites' => $visites, 'reparations' => $reparations]);

    }
}
