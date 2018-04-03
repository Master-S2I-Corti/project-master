<?php
namespace App\Http\Controllers;
use App\Annee;
use App\Matiere;
use App\Enseignant;



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
        $matieres = Matiere::get();
        $enseignants = Enseignant::get();
        
        return view("edtAdmin",compact('classes', 'matieres', 'enseignants'));
    }

}