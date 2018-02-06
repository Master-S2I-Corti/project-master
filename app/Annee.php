<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Annee extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = "Annee";
    
    public function diplome()
        {
            return $this->hasOne('App\Diplome', "id_diplome")->withDefault();
        }
}