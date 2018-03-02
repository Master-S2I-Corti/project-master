<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Est_responsable extends Model
{
    protected $table = 'Est_responsable';

    protected $fillable = [
        'code_professeur','id_reponsabilite'
    ];

    public $timestamps = false;
}
