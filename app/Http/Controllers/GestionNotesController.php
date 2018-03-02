<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Matiere;
use App\Evaluation;
use DB;
use Response;

class GestionNotesController extends Controller
{
    public function deleteEvalById(Request $request){

            $array_request=$request->all();
            $idEvalToDelete =  $array_request['idEvalTodelete'];
            $data = Evaluation::where('id_eval', $idEvalToDelete)->delete();
    }

    public function index() {
        // A Adapter

        $moduleFilter=1;
        $matiere=Matiere::all();
        $evaluation = DB::table('Evaluations')->where('id_matiere',$moduleFilter)->get();
        //echo '<pre>'; print_r($evaluation); echo'</pre>';
        $data = array(
            'matiere'  => $matiere,
            'evaluation'   => $evaluation
        );
        return view('gestionNotes')->with('data',$data);
    }
}


