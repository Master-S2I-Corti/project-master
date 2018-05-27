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
        'id','type','heure',"id_departement",'batiment','etage'
    ];

    public $timestamps = false;

    public function identity()
    {
        return $this->belongsTo('App\Personne','id');
    }

    public function departement()
    {
        return $this->belongsTo('App\Departement','id_departement','id_departement');
    }

    public function status()
    {
        return $this->belongsTo('App\status','id_status','id_status');
    }

    public function Est_Responsable()
    {
        return $this->hasMany('App\Est_Responsable','code_professeur','code_professeur');
    }

    public function Responsable_diplome()
    {
        return $this->hasMany('App\Responsable_diplome','code_professeur','code_professeur');
    }

    public function Indisponibilite()
    {
        return $this->hasMany('App\Indisponibilite','code_professeur','code_professeur');
    }

}