<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Element_constitutif;
use App\Evaluation;
use App\Semestre;
use App\Annee;
use DB;
use Response;
use Auth;





class GestionNotesController extends Controller
{


    public function deleteEvalById(Request $request){

            $array_request=$request->all();
            $idEvalToDelete =  $array_request['idEvalTodelete'];
            $data = Evaluation::where('id_evaluation', $idEvalToDelete)->delete();
    }

    public function index() {
        

        // A Adapter

        // $moduleFilter=1;

        // $matiere=Element_constitutif::all();
        // $evaluation = DB::table('Evaluations')->where('id_matiere',$moduleFilter)->get();
        // $semestre = DB::table('Semestre')->get();

       $idProfC=Auth::user()->id;
        $req=DB::select('SELECT DISTINCT d.libelle as fil, d.niveau as niv, a.libelle as ann, a.id_annee as idann FROM  Enseignant es,Element_Constitutif el, UE ue,Semestre s,Annee a,Diplome d, Realise_Matiere rm, Personne p WHERE  es.id=p.id AND es.code_professeur=rm.code_professeur AND rm.id_matiere=el.id_matiere AND el.id_ue=ue.id_ue AND ue.id_semestre = s.id_semestre AND s.id_annee= a.id_annee AND a.id_diplome= d.id_diplome AND p.id='.$idProfC.'');



        $promo =array();

        foreach ($req as $val) 
        {
            $pAnnee= $val->niv.' '.$val->ann[0].' '.$val->fil;

            array_push($promo,array('id'=>$val->idann,'promo'=> $pAnnee));
        }
        
        // // Recuperation Promo  
        // $promo= Annee::get();


        return view('gestionNotes')->with('data',$promo);
    }



    public function onChangeMatiere(Request $request)
    {
         $array_request=$request->all();
         $selectedId= $array_request['selectedId'];

         // Jointure entre matiere et evaluation

         $data2= DB::table('Evaluations')
            ->where('id_matiere',$selectedId)
            // ->join('matiere', 'matiere.id', '=', 'evaluation.id_matiere')
            ->orderBy('id_evaluation', 'desc')
            ->get();

            $html='';

            
            foreach ($data2 as $line) 
            {
                

                $html.='
                         <tr id="ligne_'.$line->id_evaluation.'">
                            <input type="hidden" name="" value="'.$line->id_evaluation.'">
                            <td class="w-25 cgeval" value="'.$line->type.'">'.$line->type.'</td>
                            
                            <td>'.$line->coeff.'</td>
                            
                            <td><i class="fa fa-lg d-inline removeLine dbRemoveEval text-danger fa-trash" id="'.$line->id_evaluation.'"></i></td>
                          
                         </tr>

                ';
            }


           return  $html;
    }


    public function onChangePromo(Request $request)
    {
        $array_request=$request->all();
        $idPromo= $array_request['idPromo'];
        $html='';



        $idProfC=Auth::user()->id;
        $data3=DB::select('SELECT DISTINCT s.libelle as Sem, s.id_semestre as id_sem FROM  Enseignant es,Element_Constitutif el, UE ue,Semestre s,Annee a,Diplome d, Realise_Matiere rm, Personne p WHERE  es.id=p.id AND es.code_professeur=rm.code_professeur AND rm.id_matiere=el.id_matiere AND el.id_ue=ue.id_ue AND ue.id_semestre = s.id_semestre AND s.id_annee= a.id_annee AND a.id_diplome= d.id_diplome AND p.id='.$idProfC.' AND s.id_annee='.$idPromo.'');


        //$data3= DB::table('Semestre')->where('id_annee',$idPromo)->get();

            if($data3)
            {
                 $html.='<option value="">SEMESTRE</option>';
                 foreach ($data3 as $line) 
                  {
                     $html.='
                                <option value="'.$line->id_sem.'"> '.$line->Sem.' </option>
                
                     ';

                  }

          
            }
         
            return  $html;

    } 

     public function onChangeSemestre(Request $request)
    {
        $array_request=$request->all();
        $idSemestre= $array_request['idSemestre'];
        $html='';


        $idProfC=Auth::user()->id;
        $data3=DB::select('SELECT DISTINCT ue.libelle as l_ue, ue.id_ue as idUe FROM  Enseignant es,Element_Constitutif el, UE ue,Semestre s,Annee a,Diplome d, Realise_Matiere rm, Personne p WHERE  es.id=p.id AND es.code_professeur=rm.code_professeur AND rm.id_matiere=el.id_matiere AND el.id_ue=ue.id_ue AND ue.id_semestre = s.id_semestre AND s.id_annee= a.id_annee AND a.id_diplome= d.id_diplome AND p.id='.$idProfC.' AND ue.id_semestre='.$idSemestre.'');

        //$data3= DB::table('Ue')->where('id_semestre',$idSemestre)->get();

            if($data3)
            {
                 $html.='<option value="">-- UE --</option>';
                 foreach ($data3 as $line) 
                  {
                     $html.='
                                <option value="'.$line->idUe.'"> '.$line->l_ue.' </option>
                
                     ';

                  }

          
            }
         
            return  $html;

    } 

    public function onChangeUe(Request $request)
    {
        $array_request=$request->all();
        $idUe= $array_request['idUe'];
        $html='';

        $idProfC=Auth::user()->id;
        $data3=DB::select('SELECT DISTINCT el.libelle as libEC, el.id_matiere as idEC FROM  Enseignant es,Element_Constitutif el, UE ue,Semestre s,Annee a,Diplome d, Realise_Matiere rm, Personne p WHERE  es.id=p.id AND es.code_professeur=rm.code_professeur AND rm.id_matiere=el.id_matiere AND el.id_ue=ue.id_ue AND ue.id_semestre = s.id_semestre AND s.id_annee= a.id_annee AND a.id_diplome= d.id_diplome AND p.id='.$idProfC.' AND el.id_ue='.$idUe.'');

        //$data3= DB::table('Element_constitutif')->where('id_ue',$idUe)->get();

            if($data3)
            {
                 $html.='<option value="">-- EC --</option>';
                 foreach ($data3 as $line) 
                  {
                     $html.='
                                <option value="'.$line->idEC.'"> '.$line->libEC.' </option>
                
                     ';

                  }

          
            }
         
            return  $html;

    } 

    public function saveEval(Request $request)
    {
        
        $text="";
        $array_request=$request->all();


        // Tab coef
        $coeff= $array_request['coeff'];

        // Tab eval 
        $eval= $array_request['eval'];

        // Matiere selectioner 
        $matiere= $array_request['matiere'];

        // $i=0;
        // foreach ($eval as $e) 
        // {
            
        //     $text.=$e.' '.$coeff[$i];
        //     $i++;
            
        // }

       // var_dump($eval);
        //DIE();


        // Si l'utilisateur connecté est un enseignant ou admin
        if(Auth::user()->code_professeur or Auth::user()->admin)
        {
            if(Auth::user()->admin)
            {
                $code_professeur=0;

            }else
            {
                $enseignant = DB::table('Enseignant')->where('id',Auth::user()->id)->get();

                //var_dump($enseignant);

                $code_professeur=$enseignant[0]->code_professeur;
            }

        $c=0;
        foreach ($eval as $e) 
        {
            
              DB::table('Evaluations')->insert(
                ['coeff' => $coeff[$c], 'type' => $e,'code_professeur'=>$code_professeur, 'id_matiere'=>$matiere]
            );
             $c++;
            
        }
    
          
            //return '<span class="alert alert-success">Evaluation(s) ajoutée(s) avec success</span>';


            // Jointure entre matiere et evaluation

         $data2= DB::table('Evaluations')
            ->where('id_matiere',$matiere)
            ->orderBy('id_evaluation', 'desc')
            ->get();

            $html='';

            
            foreach ($data2 as $line) 
            {
                

                $html.='
                         <tr id="ligne_'.$line->id_evaluation.'">
                            <input type="hidden" name="" value="'.$line->id_evaluation.'">
                            <td class="w-25 cgeval">'.$line->type.'</td>
                            
                            <td>'.$line->coeff.'</td>
                            
                            <td><i class="fa fa-lg d-inline removeLine dbRemoveEval text-danger fa-trash-o" id="'.$line->id_evaluation.'"></i></td>
                          
                         </tr>

                ';
            }


           return  $html;
           


           
            
        }
  

    //return $text;



    } 

    public function saveNoteEtu(Request $request)
    {
         $array_request=$request->all();

          $tab_idEval= $array_request['tab_idEval'];
          $code_etudiant=$array_request['code_etudiant'];


          foreach ($tab_idEval as $idEval) 
          {
              
            $note=$array_request['noteEval_'.$idEval];
             // Select pour verifier si la ligne n'existe deja pas  
            $req=DB::select('SELECT * FROM  Note n WHERE  n.code_etudiant='.$code_etudiant.' AND n.id_evaluation = '.$idEval.' ');

            if($req)
            {
                // Modification 

                $upd=DB::update('UPDATE Note SET note="'. $note.'" WHERE code_etudiant='.$code_etudiant.' AND id_evaluation= '.$idEval.' ');

            }else
            {
                $ins=DB::insert('INSERT INTO Note(note,code_etudiant,id_evaluation) VALUES("'.$note.'",'.$code_etudiant.','.$idEval.')');
            }


          }

    }

    public function saveNote(Request $request)
    {
         $array_request=$request->all();
         $tab_idEval= $array_request['tab_idEval']; 
         $tab_idEtu = $array_request['tab_idEtu'];

         // echo $array_request['session'];

         // DIE();

         $e=0;

         foreach ($tab_idEval as $idEval) 
         {

            foreach ($tab_idEtu as $idEtu ) 
            {
                $session=$array_request['session_'.$idEtu];
                    $note=$array_request['note_'.$idEval.'_'.$idEtu];

                    if(is_numeric($note) OR strtoupper($note) =="ABI" OR strtoupper($note) == "ABJ")
                    {
                         // Select pour verifier si la ligne n'existe deja pas  
                        $req=DB::select('SELECT * FROM  Note n WHERE  n.code_etudiant='.$idEtu.' AND n.id_evaluation = '.$idEval.' ');

                        if($req)
                        {
                            // Modification 
                            $upd=DB::update('UPDATE Note SET note="'. $note.'",session="'.$session.'" WHERE code_etudiant='.$idEtu.' AND id_evaluation= '.$idEval.' ');

                        }else
                        {
                            $ins=DB::insert('INSERT INTO Note(note,code_etudiant,id_evaluation,session) VALUES("'.$note.'",'.$idEtu.','.$idEval.','.$session.')');
                        }
                    }else
                    {
                        $e++;
                        echo "Erreur sur la note : ".$note." de l'etudiant ".$idEtu;
                    }

                    
            }

         }

         if($e>0)
         {
                return 0;
         }else
         {
            return 1;
         }
         





    }

    public function getNoteEval(Request $request)
    {
        $array_request=$request->all();
        $ec= $array_request['matiere'];
        $c_etudiant= $array_request['code_etudiant'];

        // $req=DB::select('SELECT type,ev.coeff,note,et.code_etudiant FROM note n, evaluations ev, etudiant et, element_constitutif el WHERE n.id_evaluation= ev.id_evaluation AND ev.id_matiere=el.id_matiere  AND n.code_etudiant = et.code_etudiant AND  el.id_matiere='.$ec.' AND et.code_etudiant = '.$c_etudiant.' ');

        // Liste des eval et coeff lier a la matiere selectionnée
        $req=DB::select('SELECT *, ev.coeff FROM  Evaluations ev, Element_Constitutif el WHERE  ev.id_matiere=el.id_matiere  AND  el.id_matiere='.$ec.' ORDER BY ev.id_evaluation DESC ');



        foreach ($req as $data) {
            echo '
                     <tr>
                                <input type="hidden" name="tab_idEval[]" value="'.$data->id_evaluation.'" >
                                <input type="hidden" name="code_etudiant" value="'.$c_etudiant.'">
                                <td class="w-25">'.$data->type.'</td>

                                <td class="w-25">
                                    '.$data->coeff.'
                                </td>

                                <td class="w-25">';

                                $req2=DB::select('SELECT n.note FROM  Evaluations ev, Note n, Etudiant et WHERE n.id_evaluation= ev.id_evaluation AND n.code_etudiant = et.code_etudiant AND et.code_etudiant = '.$c_etudiant.' AND ev.id_evaluation='.$data->id_evaluation.'  ');

                                echo '<input type="text"';
                                foreach ($req2 as $key) {
                                    echo ' value="'.$key->note.'"';
                                }

                                echo  'name="noteEval_'.$data->id_evaluation.'"class="form-control form-control-sm w-50"/>
                                </td>


                    </tr>
                
            ';
        }
    }



    public function getListNoteEtu(Request $request)
    {

         $array_request=$request->all();

         $search= $array_request['search'];
         $promo= $array_request['promo'];
         $semestre= $array_request['semestre'];
         $ue= $array_request['ue'];
         $ec= $array_request['matiere'];

         // $data= DB::table('Personne')
         //    ->join('etudiant', 'etudiant.id', '=', 'personne.id')
         //    ->join('annee','annee.id_annee','=', 'etudiant.id_annee')
         //    ->join('semestre','semestre.id_annee','=', 'annee.id_annee')
         //    ->join('ue','ue.id_semestre','=', 'semestre.id_semestre')
         //    ->join('element_constitutif','element_constitutif.id_ue','=', 'ue.id_ue')
         //    ->where('annee.id_annee',$promo)
         //    ->get();

         if($search!='') 
         {
             $data=DB::select("SELECT * FROM Personne p, Etudiant e, Annee a WHERE e.id=p.id  AND a.id_annee=e.id_annee  AND a.id_annee=  $promo AND (p.nom LIKE '%$search%' OR p.prenom LIKE '%$search%')");

         }else
         {
             $data=DB::select('SELECT * FROM Personne p, Etudiant e, Annee a WHERE e.id=p.id  AND a.id_annee=e.id_annee  AND a.id_annee='.$promo.'');
         }
        



         // Liste des eval et coeff lier a la matiere selectionnée
        $reqr=DB::select('SELECT *, ev.coeff FROM  Evaluations ev, Element_Constitutif el WHERE  ev.id_matiere=el.id_matiere  AND  el.id_matiere='.$ec.' ORDER BY ev.id_evaluation DESC ');


    

          echo'
               <thead style="color:#fff; background-color:#343a40;">
                <tr>
                    <th>#</th>
                    <th>Prenom</th>
                    <th>Nom</th>
                    <th>Session</th>';

                    foreach ($reqr as $datar) {

                      echo'<th>'.$datar->type.' ('.$datar->coeff.')</th>';
                       echo '<input type="hidden" name="tab_idEval[]" value="'.$datar->id_evaluation.'" >';
                    }

                    echo'
                    <th style="text-align:center;">Moyenne</th>
                    
                </tr>
                </thead>
                <tbody id="lstEtud">
              
    
                          
            ';

            //<th class="w-20" style="width:20px;">Modifier</th>

              foreach ($data as $d) 
              {
                 //print_r($d->code_etudiant);
                  $req=DB::select('SELECT type,ev.coeff,note,et.code_etudiant FROM Note n, Evaluations ev, Etudiant et, Element_Constitutif el WHERE n.id_evaluation= ev.id_evaluation AND ev.id_matiere=el.id_matiere  AND n.code_etudiant = et.code_etudiant AND  el.id_matiere='.$ec.' AND et.code_etudiant = '.$d->code_etudiant.' ');

                  $ret2=DB::select('SELECT session FROM Note n, Evaluations ev, Etudiant et, Element_Constitutif el WHERE n.id_evaluation= ev.id_evaluation AND ev.id_matiere=el.id_matiere  AND n.code_etudiant = et.code_etudiant AND  el.id_matiere='.$ec.' AND et.code_etudiant = '.$d->code_etudiant.' ');

                  //var_dump($ret2);

                  
                   echo' <tr>
                             <input type="hidden" name="tab_idEtu[]" value="'.$d->code_etudiant.'">

                                  <td>'.$d->code_etudiant.'</td>
                                  <td class="prenom">'; 

                                      $prenom=str_ireplace($search,'<mark style="padding:0;">'.$search.'</mark>',$d->prenom);
                                      echo $prenom;
                                  
                              echo'</td>


                                  <td class="nom">';
                                        $nom=str_ireplace($search,'<mark style="padding:0;">'.$search.'</mark>',$d->nom);
                                      echo $nom;
                            echo'</td>';

                            echo'<td style="width:60px;"><select name="session_'.$d->code_etudiant.'"  class="form-control form-control-sm"><option value="1">1</option> <option '; if(isset($ret2[0]->session)){if($ret2[0]->session==2){echo 'selected';}}echo ' value="2">2</option></select></td>';


                              // Traitement eval 

                             foreach ($reqr as $datar) {

                                 $req2=DB::select('SELECT n.note, ev.type FROM  Evaluations ev, Note n, Etudiant et WHERE n.id_evaluation= ev.id_evaluation AND n.code_etudiant = et.code_etudiant AND et.code_etudiant = '.$d->code_etudiant.' AND ev.id_evaluation='.$datar->id_evaluation.'  ');


                                     echo'<td style="width:70px;"><input type="text" name="note_'.$datar->id_evaluation.'_'.$d->code_etudiant.'"'; foreach ($req2 as $key) {echo 'value="'.$key->note.'"';}  echo 'required class="form-control form-control-sm ';  if($datar->type!="TP" AND $datar->type!="CC" AND $datar->type!="EXAM" ){echo 'onlyNum';}  echo ' "></td>';

                            
                      
                              }
                          

                            echo'
                                  <td style="text-align:center;" class="moyenne">';

                                  $note=0;
                                  $totalCoeff=0;

                                  $abi=0;

                                      foreach ($req as $dd)
                                      {
                                          if($dd->code_etudiant==$d->code_etudiant)
                                          {
                                            

                                             

                                             if(is_numeric($dd->note))
                                             {
                                                $totalCoeff+=$dd->coeff;
                                                $note+= $dd->note*$dd->coeff;

                                             }else if($dd->note=="ABI")
                                             {
                                                $abi++;
                                                $totalCoeff+=$dd->coeff;
                                                $note+= 0*$dd->coeff;

                                             }else if($dd->note=="ABJ")
                                             {
                                                $totalCoeff+=$dd->coeff;
                                                $note+= 0*$dd->coeff;
                                             }

                                             

                                              //var_dump(${"note" . $d->code_etudiant});
                                             
                                          }
                                      }

                                     if($totalCoeff!=0  AND $note!=0)
                                     {


                                        if($abi==0)
                                        {
                                            $moyy=number_format($note/$totalCoeff, 2, ',', ' ');
                                            if($moyy<10)
                                            {
                                                   echo '<span style="color:red !important;"> '.$moyy.' </span>'; 
                                            }else
                                            {
                                                echo $moyy;
                                            }
                                        }else 
                                        {
                                             echo '<span style="color:red !important;"> DEF </span>'; 
                                        }


                                     }else
                                     {

                                     }
                                            
                                      


                                  echo'</td>';
                                  //echo' <td><i class="fa fa-fw fa-pencil-square-o fa-lg mdfIon " data-target="#myModal" data-toggle="modal"><input type="hidden" value="'.$d->code_etudiant.'"></i></td> ';
                                  echo'
                                     }
                          </tr>';


                  

              }


              echo'  </tbody>';

    }


}

?>

