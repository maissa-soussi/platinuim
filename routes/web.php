<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckConnected;

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

Route::get('/',"LoginController@index");
// login route 
Route::post('/login',"LoginController@login");



// routes
Route::group(['middleware' => [CheckConnected::class]], function () {
    Route::get("/dashboard", "AdminHomeController@dashboard")->name('dashboard');
    Route::resource('categories', 'CategorieController');
    Route::resource('vehicules', 'VehiculeController');
    Route::resource('clients', 'ClientController');
    Route::resource('reservations', 'ReservationController');
    Route::get("/planning", "ReservationController@planning")->name('planning') ;
    Route::get("/search", "ReservationController@search") ;
    Route::resource('users', 'UserController');
    // Logout route 
});
Route::get('/logout',"LoginController@logout")->name('logout');






