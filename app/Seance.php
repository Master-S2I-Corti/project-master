<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seance extends Model
{

    protected $table = "Seance";

    public $timestamps = false;

    
    protected $fillable = [
        'type','heure_debut', 'heure_fin', 'date_seance', 'remarque', 'id_matiere', 'id_salle', 'code_professeur'
    ];

    
    public function matiere() {
        return $this->hasOne('App\Matiere', "id_matiere", "id_matiere");
    }


    public function getEcart() {
        $h1= date('H', strtotime($this->heure_debut));
        $h2= date('H',strtotime( $this->heure_fin));
        $m1= intval(date('i',strtotime( $this->heure_debut)));
        $m2= intval(date('i',strtotime($this->heure_fin)));
        return ($h2-$h1)*4+($m2-$m1)/15;

    }

}

