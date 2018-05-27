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


        
         $data= DB::table('etudiant')
            ->join('annee','annee.id_annee','=','etudiant.id_annee') 
            ->join('diplome','annee.id_diplome','=','diplome.id_diplome')
            ->join('personne','personne.id','=','etudiant.id')
            ->where('personne.id',$utilisateur)
            ->select('annee.id_annee','annee.libelle')          
            ->get();


         return view('notes')->with('data',$data);


    }


}
