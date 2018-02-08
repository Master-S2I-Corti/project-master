<?php

namespace App\Http\Controllers;

use App\Personne;
use Illuminate\Http\Request;
use App\Etudiant;
use App\Departement;
use Illuminate\Support\Facades\Hash;

class ListeEtudiantController extends Controller
{
    // Accès à la page Liste etudiant
    public function index()
    {
        $listesEtudiant = Personne::where('code_etudiant','!=',0)->paginate(7);
        $listeDepartement = Departement::get();

        return view('listeEtudiant', compact('listesEtudiant','listeDepartement'));
    }

    //Enregistrement d'un nouveau etudiant
    public function store(Request $request){
        $personne = Personne::firstOrCreate([
            'identifiant' => $request->nom,
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'email_sos' => $request->emailSos,
            'naissance'=> $request->naissance,
            'password' =>  Hash::make(str_replace("-","",$request->naissance)),
            'tel' => $request->tel,
            'adresse' =>$request->adresse,
            'code_postal' =>$request->codePostal,
            'ville' =>$request->ville,
            'admin' =>0
            ]);
        
            $personne->where('identifiant', $personne['identifiant'])->first();
            $etudiant = Etudiant::firstOrCreate(['id'=>$personne->id]);
            $etudiant = $etudiant->where('id', $personne->id)->first();
            $personne->where('identifiant', $personne['identifiant'])->update(['code_etudiant' =>$etudiant->code_etudiant]);
    
            return redirect()->action('ListeEtudiantController@index');
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
    public function destroy(Request $request)
    {
        $personne = Personne::findOrFail($request->id);
        $test = [ 'code_etudiant' => null];
        $personne->update($test);
        $etudiant = Etudiant::findOrFail($request->id);
        $test = [ 'id' => null];
        $etudiant->update($test);
        $personne->delete();
        $etudiant->delete();
        return redirect()->action('ListeEtudiantController@index');
    }
    

    
}
