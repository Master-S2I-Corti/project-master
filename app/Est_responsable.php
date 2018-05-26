<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Est_responsable extends Model
{
    protected $table = "Est_Responsable";

    protected $fillable = [
        'code_professeur','id_reponsabilite'
    ];

    public $timestamps = false;

    public function Responsabilite()
    {
        return $this->belongsTo('App\Responsabilite','id_reponsabilite','id_reponsabilite');
    }
}
