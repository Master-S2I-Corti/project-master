<?php

namespace App\Http\Controllers;

use App\Matiere;
use Illuminate\Support\Facades\DB;

class NotesController extends Controller {

    public function etudiant() {
        return view('etudiant.notes');
    }

    public function enseignant() {
        // A Adapter

        $moduleFilter=1;
        $matiere=Matiere::all();
        $evaluation = DB::table('Evaluations')->where('id_matiere',$moduleFilter)->get();
        //echo '<pre>'; print_r($evaluation); echo'</pre>';
        $data = array(
            'matiere'  => $matiere,
            'evaluation'   => $evaluation
        );
        return view('enseignant.notes')->with('data',$data);
    }
}
