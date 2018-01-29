<?php

namespace App\Http\Controllers;

use App\Enseignant;
use Illuminate\Http\Request;

class ListeProfController extends Controller
{
    // Accès à la page Liste Prof
    public function index()
    {
        $recherche = null;
        $profs = Enseignant::get();
        return view('listeEnseignant', compact('profs','user','recherche'));
    }


    //Accès au formulaire pour créer un prof
    public function create(){
        return view('test/newProf');
    }

    //Enregistrement d'un nouveau prof
    public function store(Request $request){
       $prof=Enseignant::create($request->all());
       $user = 'admin';
        return redirect()->action('ListeProfController@index', compact('user'));
    }

    //Accès à la page de modification d'un prof                                     un prof peut modifier sa fiche
    public function edit($id) 
    {
        $profs = Enseignant::findOrFail($id);
        return view('test/editProf', compact('profs'));
    }

    //Enregistrement de la modification du prof 
    public function update( Request $request)
    {
        $prof = Enseignant::findOrFail($request->id);
        $prof->update($request->all());
        $user = 'admin';
        return redirect()->action('ListeProfController@index', compact('user'));
    }

    //Suppression du prof
    public function destroy($id)
    {
        $prof = Enseignant::findOrFail($id);
        $prof->delete();
        $user = 'admin';
        return redirect()->action('ListeProfController@index', compact('user'));
    }
    

    
}
