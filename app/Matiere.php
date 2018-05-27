<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matiere extends Model
{

    protected $table = "Element_Constitutif";

    public $timestamps = false;

     public function toArray()
    {
        return [
            'id_matiere' => $this->id_matiere,
            'libelle' => $this->libelle
         ];
    }
    
}

