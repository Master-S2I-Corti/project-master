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
        'id'
    ];

    public $timestamps = false;
    
    public function personne() {
        return $this->hasOne('App\Personne', "id", "id");
    }
}