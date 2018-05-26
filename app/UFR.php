<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class UFR extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = "UFR";
    protected $fillable = ["libelle"];

}