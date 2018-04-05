<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Responsabilite extends Model
{
    protected $table = "Responsabilite";

    protected $fillable = [
        'id_reponsabilite'
    ];

    public $timestamps = false;
}
