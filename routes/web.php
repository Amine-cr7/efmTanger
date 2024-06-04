<?php

use App\Http\Controllers\RendezVousController;
use App\Models\RendezVous;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/rendez-vous',[RendezVousController::class,'index'])->name('home');
Route::get('/rendez-vous/create',[RendezVousController::class,'create']);
Route::post('/rendez-vous',[RendezVousController::class,'enregistrer'])->name('enregistrer');
Route::delete('/rendez-vous/{id}',[RendezVousController::class,'destroy']);
Route::res