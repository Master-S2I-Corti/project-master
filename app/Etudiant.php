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

    public function Est_Diplome()
    {
        return $this->hasMany('App\Est_Diplome','code_etudiant','code_etudiant')->orderBy('obtention', 'asc');
    }

    public function Est_diplome_hors_univ()
    {
        return $this->hasMany('App\Est_diplome_hors_univ','code_etudiant','code_etudiant')->orderBy('obtention', 'asc');
    }
}