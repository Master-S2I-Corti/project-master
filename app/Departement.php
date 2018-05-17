<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
    protected $table = "Departement";

    protected $fillable = [
        'id_departement'
    ];

    public function ufr()
    {
        return $this->belongsTo('App\Ufr','id_ufr','id_ufr');
    }
    
}
