<?php
namespace App\Http\Controllers;



class SalleController extends Controller
{


    public function liste() {
        return view("salles");
    }

    public function index() {
        return view("salleAdmin");
    }

    public function gestion() {
        return view("salleGestion");
    }

    public function add() {
        return view("salleAjout");
    }


    public function groupes() {
        return view("salleGroupAjout");
    }



}