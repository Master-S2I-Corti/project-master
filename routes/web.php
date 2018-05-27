<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index');
Route::get('password/confirmation', 'ConfirmationController@confirmationEnvoie');
Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail');
Route::post('password/reset', 'ResetPasswordController@reset');
Route::get('/changePassword','ChangePasswordController@showChangePasswordForm');
Route::post('/changePassword','ChangePasswordController@changePassword')->name('changePassword');
Route::get('refresh_captcha', 'HomeController@refreshCaptcha')->name('refresh_captcha');

Route::get("/etudiants", function() {
   return App\Personne::all();
});



Route::middleware(['roles:etudiant'])->group(function () {
    Route::get('/notes', 'NotesController@index');
    Route::post('changeSemestre', 'NotesController@onChangeSemestre');
    Route::post('changeDiplome', 'NotesController@onChangeDiplome');
    Route::post('changeDiplome2', 'NotesController@onChangeDiplome2');
    Route::post('changeAnnee', 'NotesController@onChangeAnnee');
    Route::post('changeAnnee2', 'NotesController@telechargementpdf');
    Route::get('test','NotesController@telechargement');
    
    Route::get('/etudiant/edt', 'EDTController@etudiant');
    Route::get('/annuaire/professeur', 'AnnuaireController@index');
    Route::get('/annuaire', 'AnnuaireController@index');
});

Route::middleware(['roles:enseignant'])->group(function () {
    Route::get('/enseignant/edt', 'EDTController@enseignant');
    Route::post('profil/ajoutIndisponible','ProfilController@ajoutIndisponible');
    Route::get('/filiere/ens','FiliereController@vueEnseignant');
});

Route::middleware(['roles:admin'])->group(function () {
    Route::get('/gestion/edt', 'EDTController@gestionActuel');
    Route::get('/gestion/edt/{week}', 'EDTController@gestion');
    Route::get('/gestion/salles', 'SalleController@index');
    Route::get('/gestion/salles/add', 'SalleController@add');
    Route::get('/gestion/salles/gestion', 'SalleController@gestion');
    Route::get('/gestion/salles/groupes', 'SalleController@groupes');
    Route::get('/gestion/filiere','FiliereController@vueAdmin');
    Route::post('annuaire/etudiants/saveEtudiant','ListeEtudiantController@store');
    Route::post('annuaire/etudiants/updateEtudiant','ListeEtudiantController@update');
    Route::post('annuaire/etudiants/deleteEtudiant','ListeEtudiantController@destroy');
    Route::post('annuaire/etudiants/saveEtudiants','ListeEtudiantController@multipleStore');

    Route::post('annuaire/professeurs/updateProf','ListeProfController@update');
    Route::post('annuaire/etudiants/updateEtudiant','ListeEtudiantController@update');
    Route::post('annuaire/professeurs/saveProf','ListeProfController@store');
    Route::post('annuaire/professeurs/deleteProf','ListeProfController@destroy');
    
    
    Route::post('edt/modifier','EDTController@update');
    Route::get('edt/supprimer/{id}','EDTController@supprimer');
    Route::post('/edt/ajout','EDTController@ajoutCour');

});

   Route::get('/gestion/salles/edt/{id}', 'SalleController@edit');
    Route::get('/gestion/salles/del/{id}', 'SalleController@delete');
    Route::get('/gestion/salles', 'SalleController@index');
    Route::get('/gestion/salles/add', 'SalleController@add');
    Route::post('/gestion/salles/add', 'SalleController@store');
    Route::get('/gestion/salles/gestion', 'SalleController@gestion');
    Route::post('/gestion/salles/group', 'SalleController@groupStore');
     Route::post('/gestion/search', 'SalleController@search');
    

Route::middleware(['roles:enseignant,etudiant'])->group(function () {
    Route::get('/edt', 'EDTController@edt');
    Route::get('/edt/{week}', 'EDTController@edtWeek');
});

Route::middleware(['roles:enseignant,admin'])->group(function () {
   Route::post('/gestion/deleteEval','GestionNotesController@deleteEvalById');
    Route::post('/gestion/changeMatiere','GestionNotesController@onChangeMatiere');

    Route::post('/gestion/promofilter','GestionNotesController@onChangePromo');
    Route::post('/gestion/semestrefilter','GestionNotesController@onChangeSemestre');
    Route::post('/gestion/uefilter','GestionNotesController@onChangeUe');
    Route::post('/gestion/saveEvaluation','GestionNotesController@saveEval');
    Route::post('/gestion/saveNoteEtu','GestionNotesController@saveNoteEtu');
    Route::post('/gestion/saveNote','GestionNotesController@saveNote');
    
    Route::post('/gestion/getNoteEvaluation','GestionNotesController@getNoteEval');
    Route::post('/gestion/noteEtu','GestionNotesController@getListNoteEtu');

    Route::get('/gestion/notes','GestionNotesController@index');
    Route::get('/ue', 'UEController@index');
    Route::get('/salles', 'SalleController@liste');
    Route::post('/searched', 'SalleController@searchEns');

});

Route::get('profil','ProfilController@index');
Route::post('profil/updateProfil','ProfilController@update');

Route::get('annuaire/etudiants','ListeEtudiantController@index');
Route::get('annuaire/professeurs','ListeProfController@index');

Route::post('annuaire/professeurs/search','ListeProfController@search');
Route::post('annuaire/etudiants/search','ListeEtudiantController@search');

Route::get('seances/week/{week}', 'EDTController@seanceWeek');
Auth::routes();

