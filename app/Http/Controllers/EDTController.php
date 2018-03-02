<?php
namespace App\Http\Controllers;



class EDTController extends Controller
{
    
    public function etudiant() {
        return view("edtEtudiant");
    }


    public function enseignant() {
        return view("edtEnseignant");
    }

    public function gestion() {
        return view("edtAdmin");
    }

}