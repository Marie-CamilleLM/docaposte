<?php

use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\MaterielController;
use App\Http\Controllers\ClassementController;
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

Route::get('/', [WelcomeController::class, "index"])->name('accueil');
Route::get('/client', [ClientController::class, "index"])->name("client");
Route::get('/classement', [ClassementController::class, "index"])->name("classement");
Route::get('/client/create', [ClientController::class, "create"])->name("client.create");
Route::post('/client/create', [ClientController::class, "store"])->name("client.ajouter");
Route::delete('/client/{id}', 'ClientController@delete')
    ->name('client.supprimer');
Route::put('/client/{client}', [ClientController::class, "update"])->name("client.modifier");
Route::get('/client/{client}', [ClientController::class, "edite"])->name("client.edite");
Route::get('/materiel/create', [MaterielController::class, "create"])->name("materiel.create");
Route::post('/materiel/create', [MaterielController::class, "store"])->name("materiel.ajouter");