<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index');
Route::get('password/reset/{token}', 'Auth\ForgotPasswordController@showResetForm');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');
Route::get('/changePassword','ChangePasswordController@showChangePasswordForm');
Route::post('/changePassword','ChangePasswordController@changePassword')->name('changePassword');

Route::get("/etudiants", function() {
   return App\Personne::all();
});



Route::middleware(['roles:etudiant'])->group(function () {
    Route::get('/notes', 'NotesController@index');
    Route::get('/etudiant/edt', 'EDTController@etudiant');
    Route::get('/annuaire/professeur', 'AnnuaireController@index');
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
    Route::post('annuaire/etudiants/saveEtudiant','ListeEtudiantController@store');
    Route::post('annuaire/etudiants/updateEtudiant','ListeEtudiantController@update');
    Route::post('annuaire/etudiants/deleteEtudiant','ListeEtudiantController@destroy');
    Route::post('annuaire/etudiants/saveEtudiants','ListeEtudiantController@multipleStore');

    Route::post('annuaire/professeurs/updateProf','ListeProfController@update');
    Route::post('annuaire/etudiants/updateEtudiant','ListeEtudiantController@update');
    Route::post('annuaire/professeurs/saveProf','ListeProfController@store');
    Route::post('annuaire/professeurs/deleteProf','ListeProfController@destroy');

});

Route::middleware(['roles:enseignant,admin'])->group(function () {
    Route::post('/gestion/deleteEval','GestionNotesController@deleteEvalById');
    Route::post('/gestion/changeMatiere','GestionNotesController@onChangeMatiere');
    Route::get('/gestion/notes','GestionNotesController@index');
    Route::get('/ue', 'UEController@index');
    Route::get('/salles', 'SalleController@liste');

});

Route::get('profil','ProfilController@index');
Route::get('annuaire/etudiants','ListeEtudiantController@index');
Route::get('annuaire/professeurs','ListeProfController@index');

Route::post('listeProf/search','ListeProfController@search');
Route::post('annuaire/etudiants/search','ListeEtudiantController@search');


Auth::routes();

