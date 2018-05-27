<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TelechargementPDF extends Controller
{
    
	 public function index() {

        $annee=Annee::all();
        $matiere=Matiere::all();
        $diplome=Diplome::all();
        $semestre=Semestre::all();

       $utilisateur= Auth::user()->id;


        
         $data= DB::table('Etudiant')
            ->join('Annee','Annee.id_annee','=','Etudiant.id_annee')
            ->join('Diplome','Annee.id_diplome','=','Diplome.id_diplome')
            ->join('Personne','Personne.id','=','Etudiant.id')
            ->where('Personne.id',$utilisateur)
            ->select('Annee.id_annee','Annee.libelle')
            ->get();


         return view('notes')->with('data',$data);


    }


}
