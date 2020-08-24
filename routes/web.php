<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

//Route::view('/client', 'client');

Route::get("/", "AdminHomeController@dashboard")->name('dashboard') ;

Route::get("/vehicule", "VehiculeController@Vehicules")->name('vehicules') ;
Route::get("/edit-vehicule/{id?}", "VehiculeController@editVehicule")->name('editvehicule') ;
Route::get("/vehicule-data", "VehiculeController@ListeVehicules")->name('listevehicules') ;
Route::post("/save-vehicule", "VehiculeController@saveVehicule")->name('savevehicule') ;
Route::post("/edit-save-vehicule", "VehiculeController@editsaveVehicule")->name('editsavevehicule') ;
Route::post("/delete-vehicule", "VehiculeController@deleteVehicule")->name('deletevehicule') ;

Route::get("/categorie", "CategorieController@categories")->name('categories') ;
Route::get("/edit-categorie/{id?}", "CategorieController@editCategorie")->name('editcategorie') ;
Route::get("/categorie-data", "CategorieController@ListeCategories")->name('listecategories') ;
Route::post("/save-categorie", "CategorieController@saveCategorie")->name('savecategorie') ;
Route::post("/edit-save-categorie", "CategorieController@editsaveCategorie")->name('editsavecategorie') ;
Route::post("/delete-categorie", "CategorieController@deleteCategorie")->name('deletecategorie') ;

Route::get("/client", "ClientController@Clients")->name('clients') ;
Route::get("/edit-client/{id?}", "ClientController@editClient")->name('editclient') ;
Route::get("/client-data", "ClientController@ListeClients")->name('listeclients') ;
Route::post("/save-client", "ClientController@saveClient")->name('saveclient') ;
Route::post("/edit-save-client", "ClientController@editsaveClient")->name('editsaveclient') ;
Route::post("/delete-client", "ClientController@deleteClient")->name('deleteclient') ;
