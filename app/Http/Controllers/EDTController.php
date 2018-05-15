<?php
namespace App\Http\Controllers;
use App\Annee;
use App\Matiere;
use App\Enseignant;
use App\Seance;
use DateTime;
use Illuminate\Http\Request;
use App\Salle;

use Illuminate\Support\Facades\DB;


class EDTController extends Controller
{
    
    public function etudiant() {
        return view("edtEtudiant");
    }


    public function enseignant() {
        return view("edtEnseignant");
    }

    public function gestion() {
        date_default_timezone_set('Europe/Paris');
        setlocale (LC_TIME, 'fr_FR.utf8','fra');
        $day = strtotime('Monday this week');
        $date= date('Y-m-d H:i:s', $day);

        $classes = Annee::get();
        $seances = Seance::get();
        $matieres = Matiere::get();
        $enseignants = Enseignant::get();
        $salles = Salle::select( DB::raw('DISTINCT(type)') )->get();
        


        return view("edtAdmin",compact('classes', 'seances', 'enseignants', "date", "matieres", "salles"));
    }


    public static function getHoraire($seances, $jour, $heure, $minute) {
        foreach($seances as $seance) {
            $date = new DateTime(date("Y-m-d" , $jour));
            $date->setTime($heure, $minute);
            //echo $seance->heure_debut ."        ".$date->format('Y-m-d H:i:s')."<br />";
            if ($date->format('Y-m-d H:i:s') == $seance->heure_debut) {
                echo "SALADE";
                return $seance;
            }
        }
        return null;

    }

    public function ajoutCour(Request $request){
        $id_salle = Salle::select()->where("type", $request->salle)->first()->id_salle;
         Seance::create([
                 'id' => null,
                 'type' => $request->type, 
                 'heure_debut' => $request->heure_debut, 
                 'heure_fin' => $request->heure_fin,
                 'date_seance' => $request->date,
                 'remarque' => $request->remarque,
                 'id_matiere' => $request->matieres, 
                 'id_salle' => $id_salle, 
                 'code_professeur' => $request->code_professeur
        ]);
        return redirect('gestion/edt');
    }
}