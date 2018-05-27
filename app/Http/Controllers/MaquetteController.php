<?php

namespace App\Http\Controllers;

use App\ArchiveMaquette;
use App\Diplome;
use App\Matiere;
use App\Semestre;
use Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Enseignant;
use Illuminate\Support\Facades\Auth;

class MaquetteController extends Controller
{
    public function gestion()
    {
        $d = Diplome::select('id_diplome', 'libelle')->
        get();
        return view('maquette/gestion')->with('data', $d);

        //print_r($d);
    }


    public function index2($diplome)///////Permet de faire la maquette des semestre
    {

        //print_r(file(URL::asset('js/maquette.json')));
        $user = Auth::user();
        /*$pro= DB::table('enseignant')->
        select('code_professeur')
        ->where('id',$user->id)
        ->first();*/


        $d = Diplome::where('id_diplome', $diplome)->first();

        if ($d == null)
            return "ce diplome n'existe pas";

        /*if($d->code_professeur!=$pro->code_professeur)
            return "vous n'ete pas responsable de ce diplome";*/

        //print_r($dip);
        $archive = ArchiveMaquette::select('file', 'annee')->
        where('id_diplome', $diplome)->/////
        get();

        $semestre = Semestre::join('Annee', 'Semestre.id_annee', 'Annee.id_annee')
            ->join('Diplome', 'Diplome.id_diplome', 'Annee.id_diplome')
            ->select('Semestre.id_semestre', 'Semestre.libelle', 'Diplome.id_diplome')
            ->where('Diplome.id_diplome', $diplome)
            ->get();


        //$thisUe->description=preg_split("/\\r\\n|\\r|\\n/",$thisUe->description);//je convertie le champ description en tableau une case pour chaque ligne


//	print_r($archive);
        $prof = Enseignant::all();

        //print_r(addslashes($archive));
        $data = array('archive' => addslashes($archive),
            'enseignant' => $prof,
            'diplome' => $diplome,
            'semestre' => $semestre);

        //print_r($data["semestre"]);
        /*semarray ressemble a ca
        ///le tableau contient des tableau de semestre
        chaque semestre contient 2 tableau
        le premier le nom et id du semestre
        le second le tableau des ue du semestre
        chaque ue comtient 2 tableau
       le premier les description de l'ue
       le second un tableau des matiere
       chaque matiere contient les donnée des matiere
        */


//	print_r($data);


        return view('maquette/card')->with('data', $data);
    }


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


    public function save2(Request $request)//////insert la maquete dans la bdd
    {

        $diplome = json_decode($request->filiere['detail']);
        if (ArchiveMaquette::where([['annee', '=', date("Y")], ['id_diplome', '=', $request->filiere['id_diplome']]])
            ->exists()) {
            ArchiveMaquette::where([['annee', '=', date("Y")], ['id_diplome', '=', $request->filiere['id_diplome']]])
                ->update(['file' => $request->filiere['detail']]);
        } else

            ArchiveMaquette::insert(['annee' => date("Y"), 'file' => $request->filiere['detail'], 'id_diplome' => $request->filiere['id_diplome']]);

        //print_r($diplome);

        foreach ($diplome as $semestre)////////diplome=diplome

        {
            echo "sem";
            $Nsem = $semestre->id_semestre;/////////l'id d'u semestre

            $tabmat = Matiere::join('UE', 'Ue.id_ue', 'Element_Constitutif.id_ue')->
            join('Semestre', 'UE.id_semestre', 'Semestre.id_semestre')->
            where('Semestre.id_semestre', $Nsem)->/////
            pluck('id_matiere');

            DB::table('Matiere')->/////////////et les efface
            wherein('id_matiere', $tabmat)->
            delete();

            DB::table('UE')/////efface toute les ue d'un semestre
            ->where('id_semestre', $Nsem)->
            delete();
            $sem = 0;

            foreach ($semestre->ues as $arrue)//////pour chaque ue
            {

                $ue = $arrue->ue;/////////ue contient les détail de cette ue
                //print_r($ue);
                //echo $sem;
                UE::insert(['id_ue' => $Nsem . 'ue' . $sem, 'libelle' => $ue->nom, 'id_semestre' => $Nsem, 'coeff' => $ue->coeff, 'description' => $ue->description,/*'id_responsable'=>$ue->responsable->id,*/
                    'edts' => $ue->ects]);
                $nmat = 0;
                echo "test";

                foreach ($arrue->matieres as $matiere)//////pour chaque matiere d'une ue
                {//id_matiere'=>$Nsem.'ue'.$sem.'m'.$nmat
                    Matiere::insert(['libelle' => $matiere->nom, 'coeff' => $matiere->coeff, 'cours' => $matiere->cour, 'td' => $matiere->td, 'tp' => $matiere->tp, 'id_ue' => $Nsem . 'ue' . $sem]);

                    $nmat++;//sert pour definir l'id de la matiere c'est le numero de la matiere dans l'ue
                }
                $sem++;
            }

        }


    }


////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function aff($diplome)///sert a afficher les détail d'un diplome,le code est plutot similaire au code d'index
    {
        $user = Auth::user();
        /*$pro= DB::table('enseignant')->
        select('code_professeur')
        ->where('id',$user->id)
        ->first();*/


        $d = DB::table('diplome')->
        where('diplome.id_diplome', $diplome)->
        first();

        if ($d == null)
            return "ce diplome n'existe pas";

        /*if($d->code_professeur!=$pro->code_professeur)
            return "vous n'ete pas responsable de ce diplome";*/

        //print_r($dip);
        $archive = DB::table('Archive_Maquette')->/////recupére toute les année du diplome(dans ma bdd la table diplome est similaire a la table diplome de la bdd du projet)
        select('file', 'annee')->
        where('id_diplome', $diplome)->/////
        get();

        $semestre = DB::table('Semestre')
            ->join('Annee', 'Semestre.id_annee', 'Annee.id_annee')
            ->join('Diplome', 'diplome.id_diplome', 'Annee.id_diplome')
            ->select('Semestre.id_semestre', 'Semestre.libelle', 'Diplome.id_diplome')
            ->where('Diplome.id_diplome', $diplome)
            ->get();


        //$thisUe->description=preg_split("/\\r\\n|\\r|\\n/",$thisUe->description);//je convertie le champ description en tableau une case pour chaque ligne


//	print_r($archive);
        $prof = DB::table('Enseignant')->


        join('Personne', 'Enseignant.id', 'Personne.id')->
        select('Enseignant.code_professeur', 'nom', 'prenom')->
        get('Enseignant.code_professeur', 'nom', 'prenom');
        $data = array('archive' => addslashes($archive),
            'enseignant' => $prof,
            'diplome' => $diplome,
            'semestre' => $semestre);

        return view('maquette/affiche')->with('data', $data);

        /*	semarray ressemble a ca
        ///le tableau contient des tableau de semestre
     chaque semestre contient 2 tableau
     le premier le nom et id du semestre
     le second le tableau des ue du semestre
     chaque ue comtient 2 tableau
    le premier les description de l'ue
    le second un tableau des matiere
    chaque matiere contient les donnée des matiere
     */
    }

    public function test()
    {
        $path = public_path('js/maquette.json');
        $archive = file_get_contents($path);
        $j = json_decode($archive);
        print_r($j);
        $j = json_encode($archive);

        //file_put_contents(public_path('js/maquette.json'),$j);
        //return view('maquette/example');
        //return view('maquette/affiche')
    }
}
