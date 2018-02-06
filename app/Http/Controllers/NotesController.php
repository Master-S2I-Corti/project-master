<?php

namespace App\Http\Controllers;

use App\Matiere;
use App\Ue;
use Illuminate\Support\Facades\DB;

class NotesController extends Controller {

    public function index() {

    	$matiere=Matiere::all();
    	$ue=Ue::all();

    	$data = array(
            'matiere'  => $matiere,
            'ue'   => $ue
        );
        return view('notes')->with('data',$data);


    }


}
