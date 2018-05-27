<?php

namespace App\Http\Controllers;

use App\Enseignant;
use App\Personne;
use App\Responsabilite;
use App\Diplome;
use App\Departement;
use App\Est_responsable;
use App\Responsable_Diplome;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User as Authenticatable;

class ListeProfController extends Controller
{
    // Accès à la page Liste Prof
    public function index()
    {
        $listesEnseignant = Enseignant::with('identity','Est_Responsable')->paginate(7);
        $listeDepartement = Departement::get();
        $listeResponsabilite = Responsabilite::get();
        $listeDiplome = Diplome::get();
        return view('listeEnseignant', compact('listesEnseignant','listeDepartement','listeResponsabilite','listeDiplome'));
    }

    //Enregistrement d'un nouveau prof
    public function store(Request $request){
        $search = Personne::where([
            ['nom', '=', $request->nom],
            ['prenom', '=', $request->prenom],
            ['naissance', '=', $request->naissance],
            ['code_professeur','!=',null]
        ])->first();

        if ($search == null)
        {
            $search = Personne::orderBy('id', 'desc')->first();
            $loginForYou = $search->login  + 1;

            $personne = Personne::firstOrCreate([
                'login'=>$loginForYou,
                'nom' => $request->nom,
                'prenom' => $request->prenom,
                'email' =>$loginForYou .'@webmail.universita.corsica',
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
                    if($res == 5){ // chef de filliere
                        $est_resp = Est_responsable::firstOrCreate([
                            'code_professeur' => $enseignant->code_professeur,
                            'id_reponsabilite' => $res
                        ]);
                        $resp_diplome = Responsable_Diplome::firstOrCreate([
                            'id_diplome' => $request->classes[$classint],
                            'code_professeur' => $enseignant->code_professeur
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
        }
        else
        {
            //Changement de fonction
            $prof = Enseignant::findOrFail($search->id);
            $prof->update(['type' =>$request->fonction]);
            //Ajout des responsabilités
            if ($request->Responsabilie[0] != "0"){
                $classint = 0;
                foreach($request->Responsabilie as $res){
                    if($res == 5){ // chef de filliere
                        $est_resp = Est_responsable::firstOrCreate([
                            'code_professeur' => $search->code_professeur,
                            'id_reponsabilite' => $res
                        ]);
                        $resp_diplome = Responsable_Diplome::firstOrCreate([
                            'id_diplome' => $request->classes[$classint],
                            'code_professeur' => $search->code_professeur
                        ]);
                        $classint = $classint + 1;
                    } else {
                        $est_resp = Est_responsable::firstOrCreate([
                            'code_professeur' => $search->code_professeur,
                            'id_reponsabilite' => $res
                        ]);
                    }
                }
            }
        }
        return redirect('annuaire/professeurs')->withOk("L'enseignant a bien été enregistré");
    }

    //Enregistrement de la modification du prof
    public function update( Request $request)
    {
        $personne = Personne::findOrFail($request->id);
        $enseignant = Enseignant::findOrFail($request->id);
        $personne->update(['email' =>$request->email,
            'tel'=>$request->tel,
            'adresse'=>$request->adresse ]);
        $enseignant->update(['id_departement'=>$request->departement,
            'batiment'=>$request->batiment,
            'etage'=>$request->etage]);

        return redirect('annuaire/professeurs')->withOk("L'enseignant a bien été modifié");
    }

    //Suppression du prof
    public function destroy(Request $request)
    {
        $personne = Personne::findOrFail($request->id);
        $personne->update([ 'code_professeur' => null]);
        $prof = Enseignant::findOrFail($request->id);
        $prof->update([ 'id' => null]);
        $responsabilite = Est_responsable::where('code_professeur',$prof->code_professeur)->delete();
        $responsable_diplome = Responsable_Diplome::where('code_professeur',$prof->code_professeur)->delete();
        $personne->delete();
        $prof->delete();
        return redirect('annuaire/professeurs')->withOk("L'enseignant a bien été supprimé");
    }

    public function search(Request $request)
    {
        if ( $request->nom != null || $request->prenom != null )
        {
            $listesEnseignant = Enseignant::join('Personne','Enseignant.code_professeur','=','Personne.code_professeur')
                ->join('Departement','Enseignant.id_departement','=','Departement.id_departement')
                ->where('Departement.id_departement','=',$request->departement)
                ->where('Personne.nom','=',$request->nom)
                ->orWhere('Personne.prenom','=',$request->prenom)
                ->where([
                    ['nom','!=',null],
                    ['prenom','!=',null]
                ])
                ->paginate(7);
        }
        else
        {
            //dd($request->all());
            $listesEnseignant = Enseignant::join('Personne','Enseignant.code_professeur','=','Personne.code_professeur')
                ->join('Departement','Enseignant.id_departement','=','Departement.id_departement')
                ->where('Departement.id_departement','=',$request->departement)
                ->where([
                    ['nom','!=',null],
                    ['prenom','!=',null]
                ])
                ->paginate(7);
        }

        $listeResponsabilite = Responsabilite::get();
        $listeDepartement = Departement::get();
        $listeDiplome = Diplome::get();
        return view('listeEnseignant', compact('listesEnseignant','listeResponsabilite','listeDepartement','listeDiplome'));
    }
}