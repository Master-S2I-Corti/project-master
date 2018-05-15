<?php
namespace App;


class Est_diplome_hors_univ extends Personne
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = "Est_diplome_hors_univ";

    protected $fillable = [
        'code_etudiant','libelle','obtention'
    ];

    public $timestamps = false;
}