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
        'id','id_annee'
    ];

    public $timestamps = false;

    public function identity()
    {
        return $this->belongsTo('App\Personne','id');
    }

    
    public function annee()
    {
        return $this->hasMany('App\Annee','id_annee','id_annee');
    }
}