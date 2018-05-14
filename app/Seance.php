<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seance extends Model
{

    protected $table = "Seance";

    public $timestamps = false;

    public function matiere() {
        return $this->hasOne('App\Matiere', "id_matiere", "id_matiere");
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
            'type' => $this->type,
            'heure_debut' => $this->heure_debut,
            'heure_fin' => $this->heure_fin,
            'matiere' => $this->matiere->libelle,
            'ecart' => $this->getEcart()
        ];
    }

}

