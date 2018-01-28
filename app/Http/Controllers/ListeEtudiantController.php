<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Etudiant;
class ListeEtudiantController extends Controller
{
    // Accès à la page Liste etudiant
    public function index($user)
    {
        $recherche = null;
        $etudiants = Etudiant::get();
        return view('listeEtudiant', compact('etudiants','user','recherche'));
    }

    //Accès au formulaire pour créer un etudiant
    public function create(){
        return view('test/newEtudiant');
    }

    //Enregistrement d'un nouveau etudiant
    public function store(Request $request){
       $etudiants=Etudiant::create($request->all());
       $user = 'admin';
        return redirect()->action('ListeEtudiantController@index', compact('user'));
    }

    //Accès à la page de modification d'un etudiant
    public function edit($id) 
    {
        $etudiants = Etudiant::findOrFail($id);
        return view('test/editEtudiant', compact('etudiants'));
    }

    //Modification du etudiant 
    public function update( Request $request)
    {
        $etudiants = Etudiant::findOrFail($request->id);
        $etudiants->update($request->all());
        $user = 'admin';
        return redirect()->action('ListeEtudiantController@index', compact('user'));
    }

    //Suppression du etudiant
    public function destroy($id)
    {
        $etudiants = Etudiant::findOrFail($id);
        $etudiants->delete();
        $user = 'admin';
        return redirect()->action('ListeEtudiantController@index', compact('user'));
    }
    

    
}
