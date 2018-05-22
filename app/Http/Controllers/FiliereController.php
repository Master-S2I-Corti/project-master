<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Diplome;
use App\UFR;
use App\Annee;

class FiliereController extends Controller
{
    public function vueAdmin()
    {
        $filieres = Diplome::get();
        $ufr = UFR::get();
        $annees = Annee::get();
        return view('filiere',compact('filieres','ufr','annees'));
    }

    public function vueEnseignant()
    {
        return view('filiereEns');
    }
}
