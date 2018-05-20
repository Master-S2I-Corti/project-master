<?php

namespace App\Http\Controllers;

use App\Enseignant;
use App\Personne;
use App\Responsabilite;
use App\Diplome;
use App\Departement;
use App\Est_responsable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User as Authenticatable;

class ListeProfController extends Controller
{
    // Accès à la page Liste Prof
    public function index()
    {
        $listesEnseignant = Personne::where('code_professeur','!=',0)
                            ->paginate(7);
        $listeResponsabilite = Responsabilite::get();
        $listeDepartement = Departement::get();
        $listeDiplome = Diplome::get();
        
        return view('listeEnseignant', compact('listesEnseignant','listeResponsabilite','listeDepartement','listeDiplome'));
    }

    //Enregistrement d'un nouveau prof
    public function store(Request $request){
        $personne = Personne::firstOrCreate([
            'login' => $request->nom,
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' =>$request->nom .'@webmail.universita.corsica',
            'email_sos' => $request->emailSos,
            'naissance'=> $request->naissance,
            'password' =>  Hash::make(str_replace("-","",$request->naissance)),
            'tel' => $request->tel,
            'adresse' =>$request->adresse,
            'code_postal' =>$request->codePostal,
            'ville' =>$request->ville,
            'admin' =>0
        ]);
        $personne->where([
                            ['nom', '=', $request->nom],
                            ['prenom', '=', $request->prenom],
                            ['naissance', '=', $request->naissance],
                        ])->first();

        $enseignant = Enseignant::firstOrCreate([
            'id'=>$personne->id,
            'type'=>$request->fonction,
            'id_departement'=>$request->departement
            ]);
        $enseignant = $enseignant->where('id', $personne->id)->first();
        $personne->update(['code_professeur' =>$enseignant->code_professeur]);

        //Ajout des responsabilités
        if ($request->Responsabilie[0] != "0"){
            $classint = 0;
             foreach($request->Responsabilie as $res){
            if($res == 3){ // chef de filliere
                $est_resp = Est_responsable::firstOrCreate([
                    'code_professeur' => $enseignant->code_professeur,
                    'id_reponsabilite' => $res,
                    'id_filliere' => $request->classes[$classint]
                    ]);
                    $classint = $classint + 1;
            } else {
                $est_resp = Est_responsable::firstOrCreate([
                    'code_professeur' => $enseignant->code_professeur,
                    'id_reponsabilite' => $res
                ]);
            }
        }
        }
        
       

        return redirect()->action('ListeProfController@index');
    
    }

    //Enregistrement de la modification du prof 
    public function update( Request $request)
    {
        $personne = Personne::findOrFail($request->id);
        $personne->update(['email' =>$request->email]);
        return redirect()->action('ListeProfController@index');
    }

    //Suppression du prof
    public function destroy(Request $request)
    {
        $personne = Personne::findOrFail($request->id);
        $personne->update([ 'code_professeur' => null]);

        $prof = Enseignant::findOrFail($request->id);
        $prof->update([ 'id' => null]);

        //A vérifier et a discuter
        $responsabilite = Est_responsable::where('code_professeur',$prof->code_professeur)->delete();

        $personne->delete();
        $prof->delete();
        return redirect()->action('ListeProfController@index');
    }
    

    
}
