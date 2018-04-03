<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Est_responsable extends Model
{
<<<<<<< HEAD
    protected $table = 'Est_responsable';

    protected $fillable = [
        'code_professeur','id_reponsabilite'
=======
    protected $table = "Est_responsable";

    protected $fillable = [
        'code_professeur','id_reponsablilite'
>>>>>>> 7293e14236425f69e08d7fefb1270061ca747ab7
    ];

    public $timestamps = false;
}
