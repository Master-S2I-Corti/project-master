<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Matiere;
use App\Evaluation;
use App\Semestre;
use DB;
use Response;

class GestionNotesController extends Controller
{
    public function deleteEvalById(Request $request){

            $array_request=$request->all();
            $idEvalToDelete =  $array_request['idEvalTodelete'];
            $data = Evaluation::where('id_evaluation', $idEvalToDelete)->delete();
    }

    public function index() {
        // A Adapter

        $moduleFilter=1;
        $matiere=Matiere::all();
        $evaluation = DB::table('Evaluations')->where('id_matiere',$moduleFilter)->get();
        $semestre = DB::table('Semestre')->get();

        // Recuperation des semestre



        //echo '<pre>'; print_r($evaluation); echo'</pre>';
        $data = array(
            'matiere'  => $matiere,
            'evaluation'   => $evaluation,
            'semestre'  => $semestre
        );
        return view('gestionNotes')->with('data',$data);
    }



    public function onChangeMatiere(Request $request)
    {
         $array_request=$request->all();
         $selectedId= $array_request['selectedId'];

         // Jointure entre matiere et evaluation

         $data2= DB::table('Evaluations')
            ->where('id_matiere',$selectedId)
            // ->join('matiere', 'matiere.id', '=', 'evaluation.id_matiere')
            ->get();

            $html='';

            
            foreach ($data2 as $line) 
            {
                

                $html.='
                         <tr id="ligne_'.$line->id_evaluation.'">
                            <input type="hidden" name="" value="'.$line->id_evaluation.'">
                            <td class="w-25">'.$line->type.'</td>
                            
                            <td>
                              <input type="number" value="'.$line->coeff.'" min="0" max="5" class="form-control form-control-sm w-25"> 
                            </td>
                            
                            <td><i class="fa fa-lg d-inline removeLine dbRemoveEval text-danger fa-trash-o" id="'.$line->id_evaluation.'"></i></td>
                          
                         </tr>

                ';
            }


           return  $html;
    }



}

?>

