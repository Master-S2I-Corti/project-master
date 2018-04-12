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
    protected $fillable = [
        "niveau",
        "libelle"
    ];

}