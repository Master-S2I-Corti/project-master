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
});

Route::middleware(['roles:enseignant,admin'])->group(function () {
    Route::post('/deleteEval','GestionNotesController@deleteEvalById');
    Route::get('/gestion/notes','GestionNotesController@index');
    Route::get('/ue', 'UEController@index');
    Route::get('/salles', 'SalleController@liste');

});



Route::get('annuaire/professeurs','ListeProfController@index');
Route::post('listeProf/search','ListeProfController@search');
//Route::get('editProf/{id}','ListeProfController@edit');
Route::get('deleteProf/{id}','ListeProfController@destroy');
//Route::get('createProf','ListeProfController@create');
Route::post('saveProf','ListeProfController@store');
Route::post('updateProf','ListeProfController@update');

Route::get('annuaire/etudiants','ListeEtudiantController@index');

Route::post('listeEtudiant/search','ListeEtudiantController@search');

//Route::get('editEtudiant/{id}','ListeEtudiantController@edit');
Route::get('deleteEtudiant/{id}','ListeEtudiantController@destroy');
//Route::get('createEtudiant','ListeEtudiantController@create');
Route::post('saveEtudiant','ListeEtudiantController@store');
Route::post('updateEtudiant','ListeEtudiantController@update');



Auth::routes();

