<?php

namespace App\Http\Controllers;

use App\Matiere;
use App\Ue;
use App\Semestre;
use App\Diplome;
use App\Annee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use PDF;

class NotesController extends Controller {

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


       public function onChangeSemestre(Request $request)
    {
         $array_request=$request->all();
         $selectedId= $array_request['selectedId'];

         // Jointure entre matiere et evaluation

        $matiere=Matiere::all();
        $ue=Ue::all();
        $diplome=Diplome::all();
        $semestre=Semestre::all();

        $utilisateur= Auth::user()->id;

        $data1 = array(
            'matiere'  => $matiere,
            'ue' => $ue,            
            'diplome'   => $diplome,
            'semestre' => $semestre
        );

         $data2= DB::table('UE')
            ->where('id_semestre',$selectedId)            
            ->get();

     $session=DB::select('SELECT DISTINCT UE.libelle,UE.id_ue, Note.session
FROM Note, Annee,UE,Diplome,Semestre,Element_Constitutif,Evaluations
WHERE Annee.id_diplome=Diplome.id_diplome 
AND  UE.id_ue=Element_Constitutif.id_ue
AND   Evaluations.id_matiere=Element_Constitutif.id_matiere
AND   Note.id_evaluation=Evaluations.id_evaluation
AND Diplome.id_diplome ='.$selectedId.'');


         $req=DB::select('SELECT type,ev.coeff,note,el.id_matiere,n.session FROM Note n, Evaluations ev, Etudiant et, Element_Constitutif el WHERE n.id_evaluation= ev.id_evaluation AND ev.id_matiere=el.id_matiere  AND n.code_etudiant = et.code_etudiant  AND et.id = '.$utilisateur.' ');

            $html='';

            
            foreach ($data2 as $line) 
            {
                

                $html.='
                         <tr  id="'.$line->id_ue.'" class="headliste clk_tgl ue"> 
                                        
                                        <td class="iconTgl"><i class="icon fa fa-plus"></i> </td>
                                        <td class="w-25">'.$line->libelle.'</td>
                                        <td>'.$line->coeff.'</td>
                                        <td></td>';
                            foreach($session as $sess){
                                if($line->id_ue == $sess->id_ue){
                            
                                    $html.='<td>session '.$sess->session.'</td>
                                <td> </td>
                                </tr>';
                            }                            
                            } 
                                        
                   foreach ($matiere as $line1) 
                    { 
                        if($line->id_ue == $line1->id_ue)
                        {

                        
                        $html.='


                                     <tr class="tbl_tgl_'.$line->id_ue.' default_hide" >
                                                <td></td>
                                                <td class="tlt_mat">'.$line1->libelle.'</td>
                                                <td class="coef'.$line->id_ue.'">'.$line1->coeff.'</td>';
                        
                                  
                                $note=0;
                                  $totalCoeff=0;
                                  $abi=0;
                            foreach ($req as $dd)
                                      {
                                        $note=0;
                                  $totalCoeff=0;
                                  
                                            
                                             if(is_numeric($dd->note))
                                             {
                                                $totalCoeff+=$dd->coeff;
                                                $note+= $dd->note*$dd->coeff;

                                             }else if($dd->note=="ABI")
                                             {
                                                $abi++;
                                                $totalCoeff+=$dd->coeff;
                                                $note+= 0*$dd->coeff;
                                                // var_dump($dd->id_matiere);
                                                // var_dump($abi);


                                             }else if($dd->note=="ABJ")
                                             {
                                                $totalCoeff+=$dd->coeff;
                                                $note+= 0*$dd->coeff;
                                             }


                                      if($totalCoeff!=0 AND $note!=0 AND $line1->id_matiere == $dd->id_matiere)
                                     { 
                                            


                                        if($abi==0)
                                        { 
                                            $moyy=number_format($note/$totalCoeff, 2, ',', ' ');
                                            if($moyy<10)
                                            {
                                                $html.= '<td class="mat'.$line->id_ue.'"><span style="color:red !important;">'.$moyy.' </span></td><td>session '.$dd->session.'</td><td></td></tr>'; 
                                            }else
                                            {
                                                $html.= '<td class="mat'.$line->id_ue.'">'.$moyy.'</td><td>session '.$dd->session.'</td><td></td></tr>';
                                            }
                                        }else 
                                        {
                                             $html.= '<td><span style="color:red !important;"> DEF </span></td><td>session '.$dd->session.'</td><td></td></tr>'; 
                                        }


                                     }
                                     }


                            }
                                           
                
                    }
            }


           return  $html;
    }

 public function onChangeDiplome(Request $request)
    {
         $array_request=$request->all();
         $selectedId= $array_request['selectedId'];
         $selectedAnnee= $array_request['selectedAnnee'];
         // Jointure entre matiere et evaluation

        $annee=Annee::all();
        $ue=Ue::all();
        $matiere=Matiere::all();
        $diplome=Diplome::all();
        $semestre=Semestre::all();

        

         $data2= DB::table('Semestre')
            ->join('Annee','Annee.id_annee','=','Semestre.id_annee') 
            ->join('Diplome','Annee.id_diplome','=','Diplome.id_diplome')
            ->where('Diplome.id_diplome',$selectedId)
            ->where('Annee.id_annee',$selectedAnnee)
            ->select('Semestre.id_semestre', 'Semestre.libelle')          
            ->get();

            
            $html='';


           if($data2){
               $html.='<option value="">--SEMESTRE--</option>';
            foreach ($data2 as $line) 
            {
                

                $html.='
                        <option value="'.$line->id_semestre.'">'.$line->libelle.'</option>
                                     
                        ';
                             
            }
        }
            
            return $html;
            
    }


    public function onChangeDiplome2(Request $request)
    {
         $array_request=$request->all();
         $selectedId= $array_request['selectedId'];

        $annee=Annee::all();
        $ue=Ue::all();
        $matiere=Matiere::all();
        $diplome=Diplome::all();
        $semestre=Semestre::all();

        $utilisateur= Auth::user()->id;


        
         $data3= DB::table('Semestre')
            ->join('Annee','Annee.id_annee','=','Semestre.id_annee') 
            ->join('Diplome','Annee.id_diplome','=','Diplome.id_diplome')
            ->join('UE','Semestre.id_semestre','=','UE.id_semestre')
            ->where('Diplome.id_diplome',$selectedId)
            ->select('UE.*')          
            ->get();

        $session=DB::select('SELECT DISTINCT UE.libelle,UE.id_ue, Note.session
FROM Note, Annee,UE,Diplome,Semestre,Element_Constitutif,Evaluations
WHERE Annee.id_diplome=Diplome.id_diplome 
AND  UE.id_ue=Element_Constitutif.id_ue
AND   Evaluations.id_matiere=Element_Constitutif.id_matiere
AND   Note.id_evaluation=Evaluations.id_evaluation
AND Diplome.id_diplome ='.$selectedId.'');


         $req=DB::select('SELECT type,ev.coeff,note,el.id_matiere,n.session FROM Note n, Evaluations ev, Etudiant et, Element_Constitutif el WHERE n.id_evaluation= ev.id_evaluation AND ev.id_matiere=el.id_matiere  AND n.code_etudiant = et.code_etudiant  AND et.id = '.$utilisateur.' ');




            $html1='';
        

            foreach ($data3 as $line) 
            {
                

                $html1.='
                         <tr  id="'.$line->id_ue.'" class="headliste clk_tgl"> 
                                        
                                        <td class="iconTgl"><i class="icon fa fa-plus"></i> </td>
                                        <td class="w-25">'.$line->libelle.'</td>
                                        <td>'.$line->coeff.'</td>
                                        <td></td> ';
                        foreach($session as $sess){
                                if($line->id_ue == $sess->id_ue){
                            
                                    $html1.='<td>session '.$sess->session.'</td>
                                <td> </td>
                                </tr>';
                            }                            
                            }
                                        
                                   
                    foreach ($matiere as $line1) 
                    { 
                        if($line->id_ue == $line1->id_ue)
                        {

                        
                        $html1.='


                                     <tr class="tbl_tgl_'.$line->id_ue.' default_hide">
                                                <td></td>
                                                <td class="tlt_mat">'.$line1->libelle.'</td>
                                                <td>'.$line1->coeff.'</td>';
                        
                                  
                                $note=0;
                                  $totalCoeff=0;
                                  $abi=0;
                            foreach ($req as $dd)
                                      {
                                        $note=0;
                                  $totalCoeff=0;
                                  
                                            
                                             if(is_numeric($dd->note))
                                             {
                                                $totalCoeff+=$dd->coeff;
                                                $note+= $dd->note*$dd->coeff;

                                             }else if($dd->note=="ABI")
                                             {
                                                $abi++;
                                                $totalCoeff+=$dd->coeff;
                                                $note+= 0*$dd->coeff;
                                                // var_dump($dd->id_matiere);
                                                // var_dump($abi);


                                             }else if($dd->note=="ABJ")
                                             {
                                                $totalCoeff+=$dd->coeff;
                                                $note+= 0*$dd->coeff;
                                             }


                                      if($totalCoeff!=0 AND $note!=0 AND $line1->id_matiere == $dd->id_matiere)
                                     { 
                                            


                                        if($abi==0)
                                        { 
                                            $moyy=number_format($note/$totalCoeff, 2, ',', ' ');
                                            if($moyy<10)
                                            {
                                                $html1.= '<td><span style="color:red !important;">'.$moyy.' </span></td><td>session '.$dd->session.'</td><td></td></tr>'; 
                                            }else
                                            {
                                                $html1.= '<td>'.$moyy.'</td><td>session '.$dd->session.'</td><td></td></tr>';
                                            }
                                        }else 
                                        {
                                             $html1.= '<td><span style="color:red !important;"> DEF </span></td><td>session '.$dd->session.'</td><td></td></tr>'; 
                                        }


                                     }
                                     }


                            }
                                           
                
                    }
            }

            
            return $html1;
    }




    public function onChangeAnnee(Request $request)
    {
         $array_request=$request->all();
         $selectedId= $array_request['selectedId'];

         // Jointure entre matiere et evaluation

        $annee=Annee::all();
        $matiere=Matiere::all();
        $diplome=Diplome::all();
        $semestre=Semestre::all();
        $utilisateur= Auth::user()->id;

        
         $data3= DB::table('Etudiant')
            ->join('Annee','Annee.id_annee','=','Etudiant.id_annee') 
            ->join('Diplome','Annee.id_diplome','=','Diplome.id_diplome')
            ->join('Personne','Personne.id','=','Etudiant.id')
            ->where('Personne.id',$utilisateur)
            ->where('Annee.id_annee',$selectedId)
            ->select('Diplome.id_diplome','Diplome.libelle','Diplome.niveau')          
            ->get();
            


            $html1='';

            if($data3){
               $html1.='<option value="0">--DIPLOME--</option>';
            foreach ($data3 as $line) 
            {
                

                $html1.='
                        <option value="'.$line->id_diplome.'">'.$line->niveau.' '.$line->libelle.'</option>
                                     
                        ';
                             
            }
        }
            
            return $html1;
    }


public function telechargementpdf(Request $request)
    {
         $array_request=$request->all();
         $selectedId= $array_request['selectedId'];

         

        $annee=Annee::all();
        $ue=Ue::all();
        $matiere=Matiere::all();
        $diplome=Diplome::all();
        $semestre=Semestre::all();

        
         $data3= DB::table('Semestre')
            ->join('Annee','Annee.id_annee','=','Semestre.id_annee') 
            ->join('Diplome','Annee.id_diplome','=','Diplome.id_diplome')
            ->join('UE','Semestre.id_semestre','=','UE.id_semestre')
            ->where('Diplome.id_diplome',$selectedId)
            ->select('UE.*')          
            ->get();


            $html1='';

            foreach ($data3 as $line) 
            {
                

                $html1.='
                         <tr  id="'.$line->id_ue.'" class="headliste clk_tgl"> 
                                        
                                        <td class="iconTgl"><i class="icon fa fa-plus"></i> </td>
                                        <td class="w-25">'.$line->libelle.'</td>
                                        <td>'.$line->coeff.'</td>
                                        <td>9.90</td> 
                                        <td> NACQ</td>
                                  
                                    </tr>';
                    foreach ($matiere as $line1) 
                    { 
                        if($line->id_ue == $line1->id_ue)
                        $html1.='


                                     <tr class="tbl_tgl_'.$line->id_ue.' default_hide">
                                                <td></td>
                                                <td class="tlt_mat">'.$line1->libelle.'</td>
                                                <td>'.$line1->coeff.'</td>
                                                <td>10</td>
                                                 <td>/</td>                                                
                                            </tr>
                ';
                    }
            }
            
            return $html1;
        }

public function telechargement()
    {

         

        $utilisateur= Auth::user()->id;

        $diplome= DB::table('Annee') 
            ->join('Etudiant','Annee.id_annee','=','Etudiant.id_annee') 
            ->join('Personne','Personne.id','=','Etudiant.id')
            ->join('Diplome','Annee.id_diplome','=','Diplome.id_diplome')            
            ->where('Personne.id',$utilisateur)
            ->select('Diplome.libelle','Diplome.niveau')          
            ->get();

          $semestre= DB::table('Semestre')
            ->join('Annee','Annee.id_annee','=','Semestre.id_annee') 
            ->join('Etudiant','Annee.id_annee','=','Etudiant.id_annee') 
            ->join('Personne','Personne.id','=','Etudiant.id')
            ->join('Diplome','Annee.id_diplome','=','Diplome.id_diplome')            
            ->where('Personne.id',$utilisateur)
            ->select('Semestre.id_semestre')          
            ->get();

            $data1= DB::table('Semestre')
            ->join('Annee','Annee.id_annee','=','Semestre.id_annee') 
            ->join('Etudiant','Annee.id_annee','=','Etudiant.id_annee') 
            ->join('Personne','Personne.id','=','Etudiant.id')
            ->join('Diplome','Annee.id_diplome','=','Diplome.id_diplome')
            ->join('UE','Semestre.id_semestre','=','UE.id_semestre')
            ->where('Personne.id',$utilisateur)
            ->select('UE.libelle','UE.id_semestre')          
            ->get();

            $data = array(
            'diplome'  => $diplome,
            'ue'  => $data1,
            'semestre' => $semestre
        );
         
         $pdf = PDF::loadView('testpdf',compact('data'));
         
         // $output = $pdf->output();
         // file_put_contents('../storage/letest.pdf', $output);
          return $pdf->stream('testpdf.pdf');
         
         

       
                
        }




}
