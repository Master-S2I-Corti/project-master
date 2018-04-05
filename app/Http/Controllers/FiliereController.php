<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FiliereController extends Controller
{
    public function vueAdmin()
    {
        return view('filiere');
    }

    public function vueEnseignant()
    {
        return view('filiereEns');
    }
}
