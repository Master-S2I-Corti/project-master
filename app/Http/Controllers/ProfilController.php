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

     //Ajout des étudiants grâce à un fichier .csv
     public function multipleStore(Request $request){ 
        if(count($request->all()) != 1)
        {
            $info = $request->fichier;
            if(($handle = fopen($info->getRealPath(),"r"))!== FALSE){
                while(($data = fgetcsv($handle,1000,",")) !== FALSE){
                    //Gestion du tableau de formation A UTILISER PLUS TARD
                    /*echo "\neleve: ";
                    if ((strpos($data[6], '-'))){
                      $tabFormation = explode('-', $data[6]);
                      for($n = 0; $n < count($tabFormation); $n++){
                          echo $tabFormation[$n] . " ";
                      }
                    } else {
                        echo $data[6];
                    }*/
                    $personne = Personne::firstOrCreate([
                        'identifiant' => $data[2],
                        'nom' => $data[2],
                        'prenom' => $data[1],
                        'email_sos' => $data[3],
                        'naissance'=> $data[5],
                        'password' =>  Hash::make(str_replace("-","",$data[5])),
                        'tel' => $data[4],
                        'admin' =>0
                        ]); //'commentaire' => $data[7],
                    $personne->where('identifiant', $personne['identifiant'])->first();
                    $etudiant = Etudiant::firstOrCreate(['id'=>$personne->id]);
                    $etudiant = $etudiant->where('id', $personne->id)->first();
                    $personne->where('identifiant', $personne['identifiant'])->update(['code_etudiant' =>$etudiant->code_etudiant]);
                }
            } 
        }
        return redirect()->action('ListeEtudiantController@index');
    }
}