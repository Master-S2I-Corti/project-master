<?php
namespace App;


class Enseignant extends Personne
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = "Enseignant";

    protected $fillable = [
<<<<<<< HEAD
        'id','type','heure','nbBureau'
=======
        'id','type','heure'
>>>>>>> 7293e14236425f69e08d7fefb1270061ca747ab7
    ];

    public $timestamps = false;
}