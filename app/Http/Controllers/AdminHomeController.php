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
        $data = array(
            'vehicules' => $vehicules,
            'clients' => $clients,
            'reservations' => $reservations,
            'souslocation' => $souslocation,

        );
        return view('views.dashboard', $data);

    }
}
