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
}


