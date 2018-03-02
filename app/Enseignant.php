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
        'id','type','heure'
    ];

    public $timestamps = false;
}