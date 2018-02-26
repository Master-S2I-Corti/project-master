<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index');



Route::get("/etudiants", function() {
   return App\Personne::all();
});



Route::middleware(['roles:etudiant'])->group(function () {
    Route::get('/notes', 'NotesController@index');
    Route::get('/etudiant/edt', 'EDTController@etudiant');
    Route::get('/annuaire/professeur', 'AnnuaireController@index');
    Route::get('/annuaire/etudiant', 'AnnuaireController@index');
    Route::get('/annuaire', 'AnnuaireController@index');
});

Route::middleware(['roles:enseignant'])->group(function () {
    Route::get('/enseignant/edt', 'EDTController@enseignant');
});

Route::middleware(['roles:admin'])->group(function () {
    Route::get('/gestion/edt', 'EDTController@gestion');
    Route::get('/gestion/salles', 'SalleController@index');
    Route::get('/gestion/salles/add', 'SalleController@add');
    Route::get('/gestion/salles/gestion', 'SalleController@gestion');
    Route::get('/gestion/salles/groupes', 'SalleController@groupes');
    Route::post('annuaire/professeurs/saveProf','ListeProfController@store');
    Route::post('annuaire/etudiants/saveEtudiant','ListeEtudiantController@store');
    Route::post('annuaire/professeurs/deleteProf','ListeProfController@destroy');
    Route::post('annuaire/etudiants/deleteEtudiant','ListeEtudiantController@destroy');
});

Route::middleware(['roles:enseignant,admin'])->group(function () {
    Route::post('/deleteEval','GestionNotesController@deleteEvalById');
    Route::get('/gestion/notes','GestionNotesController@index');
    Route::get('/ue', 'UEController@index');
    Route::get('/salles', 'SalleController@liste');

});

Route::get('profil','ProfilController@index');
Route::get('annuaire/professeurs','ListeProfController@index');
Route::get('annuaire/etudiants','ListeEtudiantController@index');
Route::post('updateProfil','ProfilController@update');


Route::post('listeProf/search','ListeProfController@search');
Route::post('listeEtudiant/search','ListeEtudiantController@search');

Route::post('updateProf','ListeProfController@update');
Route::post('updateEtudiant','ListeEtudiantController@update');


Route::get('annuaire/etudiants/saveEtudiants','ListeEtudiantController@multipleStore');

Auth::routes();

