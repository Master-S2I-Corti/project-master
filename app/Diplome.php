<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Diplome extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = "Diplome";
    protected $fillable = ["id_diplome","libelle","niveau","maquetteEtat","id_departement"];

    public $timestamps = false;
}
