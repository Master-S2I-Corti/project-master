<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salle extends Model
{
    protected $table = "Salle";
    
    public function toArray()
    {
        return [
            'id_salle' => $this->id_salle,
            'type' => $this->type,
         ];
    }
}
