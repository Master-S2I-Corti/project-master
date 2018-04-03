<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Enseignant;
use App\Etudiant;
use App\Personne;
use App\Departement;



class ProfilController extends Controller
{

    public function index() {
        $listeDepartement = Departement::get();
       // $log=Personne::where('id', Auth::user()->getId())->first(); 
        $log = Auth::user();
        //dd($log->isEtudiant());
        if ( $log->isEtudiant())
        {
            $id= $log->code_etudiant;
            $myProfil =  Etudiant::with('identity','annee')->where([
                ['code_etudiant', '=',$id]
            ])->first();
        }
        else if ( $log->isEnseignant())
        {
            $id= $log->code_professeur;
            $myProfil =  Enseignant::with('identity','departement')->where([
                ['code_professeur', '=',$id]
            ])->first();
            //dd($myProfil);
        }
        else
        {
            //Faire l'affichage de  l'admin ou autre
            $myProfil = "identity = "+$log ;    dd($myProfil);
        }
   

       // $enseignant = Enseignant::where('id',$log['id'])->first();
        return view("profil",compact('myProfil','listeDepartement'));
    }

    public function update( Request $request)
    {
        //A FINIR MODIF DU PROFIL
        //dd($request->all());
        $log = Auth::user();//Etudiant::findOrFail($request->id);
        //Update de la personne
        $personne = Personne::where('id',$log['id'])->update([
        'email_sos' => $request->email_sos,
        'tel' => $request->tel,
        'adresse' => $request->adresse,
        'code_postal' => $request->code_postal,
        'ville' => $request->ville
        ]);
        //Si c'est un enseignant
        if ($log->isEnseignant()){
            $ens = Enseignant::where('id',$log['id'])->update([
                'batiment' => $request->batiment,
                'etage'=> $request->etage
                ]);
            //$ens::update();//update la table enseignant
        } else if ($log->isEtudiant()){ // Si c'est un eleve
            // ETUDIANT A FAIRE : CHAMPS DE L ETUDIANT A UPDATE
        }
        //$user = 'admin';
        return redirect()->action('ProfilController@index');
    }
}