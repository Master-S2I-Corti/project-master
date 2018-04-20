<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Est_diplome extends Model
{
    protected $table = "Est_diplome";

    protected $fillable = [
        'code_etudiant','id_annee','obtention'
    ];

    public $timestamps = false;

    public function annee()
    {
        return $this->belongsTo('App\Annee','id_annee','id_annee');
    }
}
