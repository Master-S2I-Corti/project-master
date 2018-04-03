<?php

namespace App\Http\Controllers;

use App\Personne;
use Illuminate\Http\Request;
use App\Etudiant;
use App\Departement;
use App\Annee;
use App\Diplome;
use Illuminate\Support\Facades\Hash;

class ListeEtudiantController extends Controller
{
    // Accès à la page Liste etudiant
    public function index()
    {
        $listesEtudiant = Etudiant::with('identity','annee')->where([
            ['id_annee', '!=',null],
        ])->paginate(7);
        // dd($listesEtudiant);
        $listeDepartement = Departement::get();
        $annee = Annee::get();
        $diplome = Diplome::get();

        for ($i = 1 ; $i <= count($annee) ; $i++ )
        {
            foreach($diplome as &$value)
            {
                $j = $i -1;
                if($annee[$j]->id_diplome == $value->id_diplome)
                {
                    $listDiplome[$j] = [
                        'id'=>$annee[$j]->id_annee,
                        'libelle'=>$annee[$j]->libelle.'  '.$value->libelle
                    ];
                }
            }
        }
        return view('listeEtudiant', compact('listesEtudiant','listeDepartement','listDiplome'));
    }

    //Enregistrement d'un nouveau etudiant
    public function store(Request $request){

        $personne = Personne::firstOrCreate([
            'login'=>$request->nom,
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email'=>$request->nom .'@webmail.universita.corsica',
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

        $etudiant = Etudiant::firstOrCreate(['id'=>$personne->id ,'id_annee'=>$request->diplome]);
        $etudiant = $etudiant->where('id', $personne->id)->first();
        $personne->update(['code_etudiant' =>$etudiant->code_etudiant]);

        return redirect()->action('ListeEtudiantController@index');
    }

    //Modification du etudiant
    public function update(Request $request)
    {
        $personne = Personne::findOrFail($request->id);
        $etudiant = Etudiant::findOrFail($request->id);
        $personne->update(['email' =>$request->email ]);
        $etudiant->update(['id_annee'=>$request->filiere]);
        return redirect()->action('ListeEtudiantController@index');
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

    //Ajout des étudiants grâce à un fichier .csv
    public function multipleStore(Request $request){
        $annee = Annee::get();
        $diplome = Diplome::get();

        for ($i = 1 ; $i <= count($annee) ; $i++ )
        {
            foreach($diplome as &$value)
            {
                $j = $i -1;
                if($annee[$j]->id_diplome == $value->id_diplome)
                {
                    $listDiplome[$j] = [
                        'id'=>$annee[$j]->id_annee,
                        'libelle'=>$value->libelle.'  '.$annee[$j]->libelle[0]
                    ];

                }
            }
        }

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
                    $filiere = null;
                    foreach($listDiplome as &$value)
                    {
                        if ($data[0] == $value['libelle'])
                        {
                            $filiere = $value['id'];
                        }
                    }

                    $personne = Personne::firstOrCreate([
                        'login' => $data[2],
                        'nom' => $data[2],
                        'prenom' => $data[1],
                        'email'=>$data[2].'@webmail.universita.corsica',
                        'email_sos' => $data[3],
                        'naissance'=> $data[5],
                        'password' =>  Hash::make(str_replace("-","",$data[5])),
                        'tel' => $data[4],
                        'admin' =>0
                    ]); //'commentaire' => $data[7],


                    $personne->where([
                        ['nom', '=', $data[2]],
                        ['prenom', '=', $data[1]],
                        ['naissance', '=', $data[5]],
                    ])->first();
                    $etudiant = Etudiant::firstOrCreate(['id'=>$personne->id,'id_annee'=>$filiere]);
                    $etudiant = $etudiant->where('id', $personne->id)->first();
                    $personne->where('login', $personne['login'])->update(['code_etudiant' =>$etudiant->code_etudiant]);
                }
            }
        }
        return redirect()->action('ListeEtudiantController@index');
    }

    public function search(Request $request)
    {
        dd($request->all());


        return view('listeEtudiant', compact('listesEtudiant','listeDepartement','listDiplome','contenuEtudiant'));
    }
}