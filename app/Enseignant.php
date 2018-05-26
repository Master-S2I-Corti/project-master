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

    public function departement()
    {
        return $this->hasMany('App\Departement','id_departement','id_departement');
    }
}