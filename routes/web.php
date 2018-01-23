<?php

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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', 'HomeController@index');

Route::get('/emploi', 'EDTController@index');

Route::get("/etudiants", function() {
   return App\Personne::all();
});


Route::get('notes', 'NotesController@index');

Route::post('deleteEval','GestionNotesController@deleteEvalById');

Route::middleware(['checkEtudiant'])->group(function () {
    //SEULEMENT ETUDIANT
});



Auth::routes();

