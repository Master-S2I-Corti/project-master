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
        'id','type','heure',"id_departement"
    ];

    public $timestamps = false;

    public function personne()
    {
        return $this->hasOne('App\Personne', "id", "id");
    }

    public function identity()
    {
        return $this->belongsTo('App\Personne','id');
    }

    public function departement()
    {
        return $this->belongsTo('App\Departement','id_departement','id_departement');
    }

    public function Status()
    {
        return $this->belongsTo('App\Status','id_status','id_status');
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
    
     public function toArray()
    {
        return [
            'code_professeur' => $this->code_professeur,
            'personne' => $this->personne,
         ];
    }

}