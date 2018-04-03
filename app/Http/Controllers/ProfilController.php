<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Enseignant;
use App\Etudiant;
use App\Personne;



class ProfilController extends Controller
{

    public function index() {
       // $log=Personne::where('id', Auth::user()->getId())->first(); 
        $log = Auth::user();
        $enseignant = Enseignant::where('id',$log['id'])->first();
        return view("profil",compact('log','enseignant'));
    }

    public function update( Request $request)
    {
        //A FINIR MODIF DU PROFIL
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
                'nbBureau' => $request->nbBureau
                ]);
            //$ens::update();//update la table enseignant
        } else if ($log->isEtudiant()){ // Si c'est un eleve
            // ETUDIANT A FAIRE : CHAMPS DE L ETUDIANT A UPDATE
        }
        //$user = 'admin';
        return redirect()->action('ProfilController@index');
    }
}