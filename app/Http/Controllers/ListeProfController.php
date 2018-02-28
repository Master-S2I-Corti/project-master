<?php

namespace App\Http\Controllers;

use App\Enseignant;
use App\Personne;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ListeProfController extends Controller
{
    // Accès à la page Liste Prof
    public function index()
    {
        $recherche = null;
        $listesEnseignant = null;
        $personnes = Personne::get();
        if( isset($personnes) )
        {
            $conteur = 0;
            foreach ( $personnes as $personne): 
                if ($personne->code_professeur !=null)
                {
                    $listesEnseignant[$conteur] = $personne;
                    $conteur++;
                }

            endforeach;
        }
        return view('listeEnseignant', compact('listesEnseignant','recherche'));
    }

    //Enregistrement d'un nouveau prof
    public function store(Request $request){
        $personne = Personne::firstOrCreate([
            'identifiant' => $request->nom,
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'mail' => $request->email,
            'password' =>  Hash::make(str_replace("-","",$request->dateNaissance))
        ]);
        
        $personne->where('identifiant', $personne['identifiant'])->first();
        $enseignant = Enseignant::firstOrCreate(['id'=>$personne->id]);
        $enseignant = $enseignant->where('id', $personne->id)->first();
        $personne->where('identifiant', $personne['identifiant'])->update(['code_professeur' =>$enseignant->code_professeur]);

        return redirect()->action('ListeProfController@index');
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
