<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index');



Route::get("/etudiants", function() {
   return App\Personne::all();
});



Route::middleware(['roles:etudiant'])->group(function () {
    Route::get('/notes', 'NotesController@index');
    Route::get('/edt', 'EDTController@index');
    Route::get('/annuaire/professeur', 'AnnuaireController@index');
    Route::get('/annuaire/etudiant', 'AnnuaireController@index');
    Route::get('/annuaire', 'AnnuaireController@index');
});

Route::middleware(['roles:enseignant,admin'])->group(function () {
    Route::post('/deleteEval','GestionNotesController@deleteEvalById');
    Route::get('/gestion/notes','GestionNotesController@index');
});



Auth::routes();

Route::get('maquette','MaquetteController@index');
Route::post('save','MaquetteController@save')->name('save');
Route::get('maquette/affichage','MaquetteController@aff');