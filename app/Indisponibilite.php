<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Indisponibilite extends Model
{
    protected $table = 'Indisponibilite';

    protected $fillable = [
        'code_professeur','debut','fin'
    ];

    public $timestamps = false;

}
