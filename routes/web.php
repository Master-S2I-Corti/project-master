<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index');



Route::get("/etudiants", function() {
   return App\Personne::all();
});

Route::middleware(['checkEnseignant'])->group(function () {
    Route::get('/gestion/notes','GestionNotesController@index');
    Route::post('deleteEval','GestionNotesController@deleteEvalById');
});


Route::middleware(['checkEtudiant'])->group(function () {
    Route::get('/notes', 'NotesController@index');
    Route::get('/edt', 'EDTController@index');
    Route::get('/annuaire/professeur', 'AnnuaireController@index');
    Route::get('/annuaire/etudiant', 'AnnuaireController@index');
});


Auth::routes();

