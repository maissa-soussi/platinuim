<?php

namespace App\Http\Controllers;
use App\Vehicule;
use App\Client;
use App\Reservation;
use DB;
use Carbon\Carbon;

use Illuminate\Http\Request;

class AdminHomeController extends Controller
{
    public function dashboard() {
        $vehicules = Vehicule::count();
        $now = date('Y-m-d');
        $souslocation = DB::table('reservations')->where('recuperation', 'like', 0)->where('date_deb', '<=', $now)->count();
        $clients = Client::count();
        $reservations = Reservation::count();
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
        $recup = DB::table('reservations')->select('vehicules.*')
        ->join('vehicules', 'vehicules.matricule', '=', 'reservations.imma_v')
        ->where('reservations.date_fin', '=', $now)->get();
         
        $data = array(
            'vehicules' => $vehicules,
            'clients' => $clients,
            'reservations' => $reservations,
            'souslocation' => $souslocation,
            'nbnotif' => $nbnotif,

        );
        $b = Carbon::parse($now)->addDays(1)->format('Y-m-d');
        $c = Carbon::parse($b)->addDays(1)->format('Y-m-d');
        $d = Carbon::parse($c)->addDays(1)->format('Y-m-d');
        $e = Carbon::parse($d)->addDays(1)->format('Y-m-d');
        $f = Carbon::parse($e)->addDays(1)->format('Y-m-d');
        $g = Carbon::parse($f)->addDays(1)->format('Y-m-d');
        $resa = DB::table('reservations')->where('reservations.date_deb', '<=', $now)->where('reservations.date_fin', '>=', $now)->count();
        $resb = DB::table('reservations')->where('reservations.date_deb', '<=', $b)->where('reservations.date_fin', '>=', $b)->count();
        $resc = DB::table('reservations')->where('reservations.date_deb', '<=', $c)->where('reservations.date_fin', '>=', $c)->count();
        $resd = DB::table('reservations')->where('reservations.date_deb', '<=', $d)->where('reservations.date_fin', '>=', $d)->count();
        $rese = DB::table('reservations')->where('reservations.date_deb', '<=', $e)->where('reservations.date_fin', '>=', $e)->count();
        $resf = DB::table('reservations')->where('reservations.date_deb', '<=', $f)->where('reservations.date_fin', '>=', $f)->count();
        $resg = DB::table('reservations')->where('reservations.date_deb', '<=', $g)->where('reservations.date_fin', '>=', $g)->count();
        
        $dataPoints = array(
            array("y" => $resa, "label" => $now),
            array("y" => $resb, "label" => $b),
            array("y" => $resc, "label" => $c),
            array("y" => $resd, "label" => $d),
            array("y" => $rese, "label" => $e),
            array("y" => $resf, "label" => $f),
            array("y" => $resg, "label" => $g)
        );
        $h = Carbon::parse($now)->subDays(6)->format('Y-m-d');
        $i = Carbon::parse($now)->subDays(5)->format('Y-m-d');
        $j = Carbon::parse($now)->subDays(4)->format('Y-m-d');
        $k = Carbon::parse($now)->subDays(3)->format('Y-m-d');
        $l = Carbon::parse($now)->subDays(2)->format('Y-m-d');
        $m = Carbon::parse($now)->subDays(1)->format('Y-m-d');
        $resn = DB::table('reservations')->where('reservations.date_deb', '=', $now)->get();
        $countn = 0;
        foreach($resn as $resn){
            $countn = $countn + $resn->montant;
        }
        $resh = DB::table('reservations')->where('reservations.date_deb', '=', $h)->get();
        $counth = 0;
        foreach($resh as $resh){
            $counth = $counth + $resh->montant;
        }
        $resi = DB::table('reservations')->where('reservations.date_deb', '=', $i)->get();
        $counti = 0;
        foreach($resi as $resi){
            $counti = $counti + $resi->montant;
        }
        $resj = DB::table('reservations')->where('reservations.date_deb', '=', $j)->get();
        $countj = 0;
        foreach($resj as $resj){
            $countj = $countj + $resj->montant;
        }
        $resk = DB::table('reservations')->where('reservations.date_deb', '=', $k)->get();
        $countk = 0;
        foreach($resk as $resk){
            $countk = $countk + $resk->montant;
        }
        $resl = DB::table('reservations')->where('reservations.date_deb', '=', $l)->get();
        $countl = 0;
        foreach($resl as $resl){
            $countl = $countl + $resl->montant;
        }
        $resm = DB::table('reservations')->where('reservations.date_deb', '=', $m)->get();
        $countm = 0;
        foreach($resm as $resm){
            $countm = $countm + $resm->montant;
        }

        $Points = array( 
            array("y" => $counth, "label" => $h ),
            array("y" => $counti, "label" => $i ),
            array("y" => $countj, "label" => $j ),
            array("y" => $countk, "label" => $k ),
            array("y" => $countl, "label" => $l ),
            array("y" => $countm, "label" => $m ),
            array("y" => $countn, "label" => $now )
        );
        return view('views.dashboard', ['recup' => $recup, 'Points' => $Points, 'dataPoints' => $dataPoints, 'data' => $data, 'assurences' => $assurences, 'vidanges' => $vidanges, 'vignettes' => $vignettes, 'visites' => $visites, 'reparations' => $reparations]);

    }
}
