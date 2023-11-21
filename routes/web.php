<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataFeedController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\PersonnelController;
use App\Http\Controllers\AchatController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\FournisseurController;
use App\Http\Controllers\DepotController;
use App\Http\Controllers\MouvementController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\VenteController;
use App\Http\Controllers\ConsignationController;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\BilanController;


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


Route::resource('personnels', PersonnelController::class);
Route::resource('clients', ClientController::class);
Route::resource('achats', AchatController::class);
Route::resource('fournisseurs', FournisseurController::class);
Route::resource('depots', DepotController::class);
Route::resource('emballages', TypeController::class);
Route::resource('mouvements', MouvementController::class);
Route::resource('stocks',StockController::class);
Route::resource('ventes',VenteController::class);
Route::resource('consignations',ConsignationController::class);


// routes/web.php
//Route::get('/bilan', 'MouvementController@generateBilan')->name('bilan.generate-pdf');
//Route::get('/bilan/export-pdf', 'MouvementController@generatePDF')->name('bilan.export-pdf');
Route::get('/bilan', [MouvementController::class ,'generateBilan1'])->name('bilan.generate-pdf');
Route::get('/bilan/export_pdf', [MouvementController::class ,'generatePDF'])->name('bilan.export-pdf');


/*Route::middleware(['guest'])->group(function () {
    Route::get('/login-then-register', [App\Http\Controllers\Auth\LoginRegisterController::class, 'showRegisterAfterLogin'])
        ->name('login_then_register');
});*/




Route::redirect('/', 'login');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    // Route for the getting the data feed
    Route::get('/json-data-feed', [DataFeedController::class, 'getDataFeed'])->name('json_data_feed');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::fallback(function() {
        return view('pages/utility/404');
    });    
});