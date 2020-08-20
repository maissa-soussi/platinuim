<?php


Route::get("/", "AdminHomeController@dashboard")->name('dashboard') ;
Route::get("/liste-vehicules", "VehiculeController@listeVehicules")->name('listevehicules') ;
Route::get("/liste-clients", "ClientController@listeClients")->name('listeclients') ;
