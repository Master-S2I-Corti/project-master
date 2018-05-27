<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seance extends Model
{

    protected $table = "Seance";
    protected $primaryKey ="id_seance";
    
    public $timestamps = false;

    
    protected $fillable = [
        'id_seance', 'type','heure_debut', 'heure_fin', 'date_seance', 'remarque', 'id_matiere', 'id_salle', 'code_professeur'
    ];

    
    public function matiere() {
        return $this->hasOne('App\Matiere', "id_matiere", "id_matiere");
    }

    public function professeur() {
        return $this->hasOne('App\Enseignant', "code_professeur", "code_professeur");
    }
    
    public function salle() {
        return $this->hasOne('App\Salle', "id_salle", "id_salle");
    }


    public function getEcart() {
        $h1= date('H', strtotime($this->heure_debut));
        $h2= date('H',strtotime( $this->heure_fin));
        $m1= intval(date('i',strtotime( $this->heure_debut)));
        $m2= intval(date('i',strtotime($this->heure_fin)));
        return ($h2*60+$m2-($h1*60+$m1))/15;

    }

    public function toArray()
    {
        return [
            'id' => $this->id_seance,
            'type' => $this->type,
            'heure_debut' => $this->heure_debut,
            'heure_fin' => $this->heure_fin,
            'date_seance' => $this->date_seance,
            'matiere' => $this->matiere->toArray(),
            'remarque' => $this->remarque,
            'ecart' => $this->getEcart(),
            'salle' => $this->salle->toArray(),
            'enseignant' => $this->professeur->toArray(),
         ];
    }

}

