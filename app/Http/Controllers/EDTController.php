<?php
namespace App\Http\Controllers;
use App\Annee;


class EDTController extends Controller
{
    
    public function etudiant() {
        return view("edtEtudiant");
    }


    public function enseignant() {
        return view("edtEnseignant");
    }

    public function gestion() {
        $classes = Annee::get();
        
        
        return view("edtAdmin",compact('classes'));
    }

}