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
Route::resource('categories', 'CategorieController');
Route::resource('vehicules', 'VehiculeController');
Route::resource('clients', 'ClientController');
Route::get('/search','VehiculeController@search');
Route::get('/searchclient','ClientController@searchclient');
