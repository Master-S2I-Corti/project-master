<?php

namespace App\Http\Controllers;

use App\Personne;
use Illuminate\Http\Request;
use App\Etudiant;
use App\Departement;
use App\Annee;
use App\Diplome;
use App\Est_diplome;
use App\Est_diplome_hors_univ;
use Illuminate\Support\Facades\Hash;

class ListeEtudiantController extends Controller
{
    // Accès à la page Liste etudiant
    public function index()
    {
        $listesEtudiant = Etudiant::with('identity','annee','Est_diplome','Est_diplome_hors_univ')->where('id_annee', '!=',null)->paginate(7);
        $listeDepartement = Departement::get();
        $listDiplome = Annee::get();
        $diplome = Diplome::get();
        return view('listeEtudiant', compact('listesEtudiant','listeDepartement','listDiplome'));
    }

    //Enregistrement d'un nouveau etudiant
    public function store(Request $request){
       if  ($request->anneeObt > date("Y") && $request->diplomeObtenu != 0 || $request->anneeObtHors > date("Y") && $request->hors != null)
       {
           return redirect('annuaire/etudiants')->withError("La date d'obtention du diplome est incorrect");
       }
        $search = Personne::where([
            ['nom', '=', $request->nom],
            ['prenom', '=', $request->prenom],
            ['naissance', '=', $request->naissance]
        ])->first();

        if ($search == null)
        {
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
            if ( $request->diplomeObtenu != 0  && $request->anneeObt <= date("Y")) {
                $est_diplome = Est_diplome::firstOrCreate([
                    'code_etudiant' => $etudiant->code_etudiant,
                    'id_annee' => $request->diplomeObtenu,
                    'obtention' => $request->anneeObt
                ]);

                $personne->where([
                    ['nom', '=', $request->nom],
                    ['prenom', '=', $request->prenom],
                    ['naissance', '=', $request->naissance],
                ])->first();

                $etudiant = Etudiant::firstOrCreate(['id' => $personne->id, 'id_annee' => $request->diplome]);
                $etudiant = $etudiant->where('id', $personne->id)->first();
                $personne->update(['code_etudiant' => $etudiant->code_etudiant]);
                if ($request->diplomeObtenu != 0 && $request->anneeObt <= date("Y")) {
                    $est_diplome = Est_diplome::firstOrCreate([
                        'code_etudiant' => $etudiant->code_etudiant,
                        'id_annee' => $request->diplomeObtenu,
                        'obtention' => $request->anneeObt
                    ]);
                }
                if ($request->anneeObtHors <= date("Y") && $request->hors != null) {
                    $est_diplome_hors_univ = Est_diplome_hors_univ::firstOrCreate([
                        'code_etudiant' => $etudiant->code_etudiant,
                        'libelle' => $request->hors,
                        'obtention' => $request->anneeObtHors
                    ]);
                }
            }
        }
        else
        {
            if ( $search->Etudiant->id_annee == null )
            {
                $search->Etudiant->update(['id_annee' =>$request->diplome]);
            }
            else if ( $request->diplomeObtenu == $search->Etudiant->id_annee &&  $request->diplomeObtenu != 0  && $request->anneeObt <= date("Y"))
            {
                $est_diplome = Est_diplome::firstOrCreate([
                    'code_etudiant'=>$search->Etudiant->code_etudiant,
                    'id_annee'=>$search->Etudiant->id_annee,
                    'obtention'=>$request->anneeObt
                ]);
                $search->Etudiant->update(['id_annee' =>$request->diplome]);
            }
            else
            {
                $search->Etudiant->update(['id_annee' =>$request->diplome]);
            }
        }
        return redirect('annuaire/etudiants')->withOk("L'étudiant a bien été enregistré");
    }

    //Modification du etudiant
    public function update(Request $request)
    {
        $personne = Personne::findOrFail($request->id);
        $etudiant = Etudiant::findOrFail($request->id);
        $personne->update(['email' =>$request->email ]);
        $etudiant->update(['id_annee'=>$request->filiere]);

        return redirect('annuaire/etudiants')->withOk("L'étudiant a bien été modifié");
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
        $test = $etudiant->code_etudiant;
        $personne->delete();
        $horsdiplomeEtudiant = Est_diplome_hors_univ::where('code_etudiant',$test)->delete();
        $diplomeEtudiant = Est_diplome::where('code_etudiant',$test)->delete();
        $etudiant->delete();

        return redirect('annuaire/etudiants')->withOk("L'étudiant a bien été supprimé");
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
        //dd($request->all());
        $listeDepartement = Departement::get();
        $listDiplome = Annee::get();

        $j=0;
        if (sizeof($request->filiere) != null )
        {
            for ($i = 1 ; $i <= sizeof($request->filiere); $i++ )
            {
                $test[$i-1] = explode(' ',$request->filiere[$i-1]);
                if ( sizeof($test[$i-1]) == 2 )
                {
                    $filiere[$j] = $test[$i-1][0];
                    if ( $test[$i-1][1] == "1" )
                    {
                        $annees[$j] = $test[$i-1][1]."ere";
                    }
                    else
                    {
                        $annees[$j] = $test[$i-1][1]."eme";
                    }

                    $j++;
                }
                else if (sizeof($test[$i-1]) != 2)
                {
                    $filiere[$j] = $test[$i-1][0];
                    $annees[$j] = 0;
                    $j++;
                }
            }
        }
        else
        {
            $annees = null;
            $filiere = null;
        }


        if ( ($request->nom != null || $request->prenom != null ) && $annees != null && $filiere != null )
        {
            $listesEtudiant = Etudiant::with('Est_diplome')
                ->join('Personne','Etudiant.code_etudiant','=','Personne.code_etudiant')
                ->join('annee','Etudiant.id_annee','=','annee.id_annee')
                ->join('Diplome','annee.id_diplome','=','Diplome.id_diplome')
                ->join('departement','diplome.id_departement','=','departement.id_departement')
                ->where('departement.id_departement','=',$request->departement)
                ->whereIn('annee.libelle',$annees)
                ->whereIn('diplome.niveau',$filiere)
                ->where('Personne.nom','=',$request->nom)
                ->orWhere('Personne.prenom','=',$request->prenom)
                ->where([
                    ['nom','!=',null],
                    ['prenom','!=',null]
                ])
                ->paginate(7);
        }
        else if (($request->nom != null || $request->prenom != null ))
        {
            $listesEtudiant = Etudiant::with('Est_diplome')
                ->join('Personne','Etudiant.code_etudiant','=','Personne.code_etudiant')
                ->join('annee','Etudiant.id_annee','=','annee.id_annee')
                ->join('Diplome','annee.id_diplome','=','Diplome.id_diplome')
                ->join('departement','diplome.id_departement','=','departement.id_departement')
                ->where('departement.id_departement','=',$request->departement)
                ->where('Personne.nom','=',$request->nom)
                ->orWhere('Personne.prenom','=',$request->prenom)
                ->where([
                    ['nom','!=',null],
                    ['prenom','!=',null]
                ])
                ->paginate(7);
        }
        else if ( $request->nom == null && $request->prenom == null && $annees != null && $filiere != null)
        {
            $listesEtudiant = Etudiant::with('Est_diplome')
                ->join('Personne','Etudiant.code_etudiant','=','Personne.code_etudiant')
                ->join('annee','Etudiant.id_annee','=','annee.id_annee')
                ->join('Diplome','annee.id_diplome','=','Diplome.id_diplome')
                ->join('departement','diplome.id_departement','=','departement.id_departement')
                ->where('departement.id_departement','=',$request->departement)
                ->whereIn('annee.libelle',$annees)
                ->whereIn('diplome.niveau',$filiere)
                ->where([
                    ['nom','!=',null],
                    ['prenom','!=',null]
                ])
                ->paginate(7);
        }
        else
        {
            //dd($request->all());
            $listesEtudiant = Etudiant::with('Est_diplome')
                ->join('Personne','Etudiant.code_etudiant','=','Personne.code_etudiant')
                ->join('annee','Etudiant.id_annee','=','annee.id_annee')
                ->join('Diplome','annee.id_diplome','=','Diplome.id_diplome')
                ->join('departement','diplome.id_departement','=','departement.id_departement')
                ->where('departement.id_departement','=',$request->departement)
                ->where([
                    ['nom','!=',null],
                    ['prenom','!=',null]
                ])
                ->paginate(7);
        }

        return view('listeEtudiant', compact('listesEtudiant','listeDepartement','listDiplome'));
    }
}