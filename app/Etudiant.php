<?php
namespace App;


class Etudiant extends Personne
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = "Etudiant";

    protected $fillable = [
        'id'
    ];

    public $timestamps = false;
}