<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class responsable_diplome extends Model
{
    protected $table = "responsable_diplome";

    public $timestamps = false;

    public function Diplome()
    {
        return $this->belongsTo('App\Diplome','id_diplome','id_diplome');
    }
}
