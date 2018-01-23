<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index');



Route::get("/etudiants", function() {
   return App\Personne::all();
});

Route::get('/notes', 'NotesController@index');
Route::get('/emploi', 'EDTController@index');
Route::get('/annuaire', 'AnnuaireController@index');

Route::middleware(['checkEnseignant'])->group(function () {
    Route::post('deleteEval','GestionNotesController@deleteEvalById');
});



Auth::routes();

