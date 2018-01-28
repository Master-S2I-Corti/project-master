<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prof;
class ListeProfController extends Controller
{
    // Accès à la page Liste Prof
    public function index($user)
    {
        $recherche = null;
        $profs = Prof::get();
        return view('listeProf', compact('profs','user','recherche'));
    }


    //Accès au formulaire pour créer un prof
    public function create(){
        return view('test/newProf');
    }

    //Enregistrement d'un nouveau prof
    public function store(Request $request){
       $prof=Prof::create($request->all());
       $user = 'admin';
        return redirect()->action('ListeProfController@index', compact('user'));
    }

    //Accès à la page de modification d'un prof                                     un prof peut modifier sa fiche
    public function edit($id) 
    {
        $profs = Prof::findOrFail($id);
        return view('test/editProf', compact('profs'));
    }

    //Enregistrement de la modification du prof 
    public function update( Request $request)
    {
        $prof = Prof::findOrFail($request->id);
        $prof->update($request->all());
        $user = 'admin';
        return redirect()->action('ListeProfController@index', compact('user'));
    }

    //Suppression du prof
    public function destroy($id)
    {
        $prof = Prof::findOrFail($id);
        $prof->delete();
        $user = 'admin';
        return redirect()->action('ListeProfController@index', compact('user'));
    }
    

    
}
