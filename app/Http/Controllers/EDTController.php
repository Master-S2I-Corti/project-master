<?php
namespace App\Http\Controllers;
use App\Annee;
use App\Matiere;
use App\Enseignant;
use App\Seance;
use DateTime;
use Illuminate\Http\Request;
use App\Salle;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;


class EDTController extends Controller
{
    
    public function edt() {
        return self::edtWeek(date ('W'));
    }
       
    
    public function edtWeek($week) {
        date_default_timezone_set('Europe/Paris');
        setlocale (LC_TIME, 'fr_FR.utf8','fra');
        $date= self::getStartDate($week, date('Y'))[0];

        return view("edt",compact("date", "week"));
    }
    

    function getStartDate($week, $year)
    {

        $time = strtotime("1 January $year", time());
        $day = date('w', $time);
        $time += ((7*($week-1))+1-$day)*24*3600;
        $return[0] = date('Y-n-j', $time);
        return $return;
    }


    
    public function gestion($week) {
        date_default_timezone_set('Europe/Paris');
        setlocale (LC_TIME, 'fr_FR.utf8','fra');
        $date= self::getStartDate($week, date('Y'))[0];

        $classes = Annee::get();
        $seances = Seance::get();
        $matieres = Matiere::get();
        $enseignants = Enseignant::get();
        $salles = Salle::select( DB::raw('DISTINCT(type)') )->get();
        


        return view("edtAdmin",compact('classes', 'seances', 'enseignants', "date", "matieres", "salles", "week"));
    }
    
    public function gestionActuel() {
        return self::gestion(date ('W'));
    }


    public static function getHoraire($seances, $jour, $heure, $minute) {
        foreach($seances as $seance) {
            $date = new DateTime(date("Y-m-d" , $jour));
            $date->setTime($heure, $minute);
            //echo $seance->heure_debut ."        ".$date->format('Y-m-d H:i:s')."<br />";
            if ($date->format('Y-m-d H:i:s') == $seance->heure_debut) {
                return $seance;
            }
        }
        return null;

    }
    
    public function supprimer($id){
        $seance = Seance::findOrFail($id);
        $seance->delete();
        return redirect('gestion/edt')->withOk("Séance supprimé avec succès");
    }

    public function update(Request $request)
    {
        $id_salle = Salle::select()->where("type", $request->salle)->first()->id_salle;
        $seance = Seance::where('id_seance', $request->id_seance)->first();
        $seance->update(['type' => $request->type, 
                 'heure_debut' => $request->heure_debut, 
                 'heure_fin' => $request->heure_fin,
                 'date_seance' => $request->date,
                 'remarque' => $request->remarque,
                 'id_matiere' => $request->matieres, 
                 'id_salle' => $id_salle, 
                 'code_professeur' => $request->code_professeur ]);
        return redirect('gestion/edt')->withOk("Séance modifié avec succès");
    }

    public function ajoutCour(Request $request){
        $id_salle = Salle::select()->where("type", $request->salle)->first()->id_salle;
        if ($request->heure_debut < $request->heure_fin){
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
           return redirect('gestion/edt')->withOk("Séance ajouté avec succès");
        }
        else {
            return redirect('gestion/edt')->withOk("Echec de l'ajout d'une séance");
        }
    }

    public function seanceWeek() {
        $user = Auth::user();
        if ($user->isEnseignant()){
            return Seance::where("code_professeur", $user->code_professeur)->get();
        }
        
         if ($user->isEtudiant()){


            return Seance::join('Participe','Seance.id_seance','=','Participe.id_seance')
                ->join('Groupe','Participe.code_groupe','=','Groupe.code_groupe')
                ->join('AppartientGroupe','Groupe.code_groupe','=','AppartientGroupe.code_groupe')
                ->join('Etudiant','Etudiant.code_etudiant','=','AppartientGroupe.code_etudiant')
                ->where('Etudiant.code_etudiant','=',$user->code_etudiant)->get();
        }
        

        return Seance::all();
    }
    
    

}