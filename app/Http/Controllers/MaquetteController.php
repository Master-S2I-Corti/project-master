<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \App\semestre;
use App\Enseignant;
use Illuminate\Support\Facades\Auth;
class MaquetteController extends Controller
{
	public function index($diplome)///////Permet de faire la maquette des semestre
	{
		
		//print_r(file(URL::asset('js/maquette.json'))); 
		    $user = Auth::user();
 /*$pro= DB::table('enseignant')->
 select('code_professeur')
 ->where('id',$user->id)
 ->first();*/
	
	
	$d=DB::table('diplome')->
	where('diplome.id_diplome',$diplome)->
	first();
	
	if($d==null)
	return "ce diplome n'existe pas";
	
	/*if($d->code_professeur!=$pro->code_professeur)
		return "vous n'ete pas responsable de ce diplome";*/
		   
		   //print_r($dip);
		    $annee = DB::table('diplome')->/////recupére toute les année du diplome(dans ma bdd la table diplome est similaire a la table diplome de la bdd du projet)
			join('annee','annee.id_diplome','diplome.id_diplome')->////annee c'est le année de ma bdd
			where('diplome.id_diplome',$diplome)->/////
			pluck('id_annee');
	
	$semestre=DB::table('semestre')->//////je  prends tout les semestre de l'année 
	select('id_semestre','libelle')->
	wherein('id_annee',$annee)->
	get();
	$semarray=array();
	foreach($semestre as $thisSem)
	{
		$semComp=array();
		$ue=DB::table('ue')->//je recupére toute les donnée et l'id ,nom et prenom du prof qui  gérent les ue d'un semestre 
		/*join('enseignant','ue.code_professeur','enseignant.code_professeur')->
		join('personne','enseignant.id','personne.id')->
		select('ue.*','nom','prenom')->*/
		where('id_semestre',$thisSem->id_semestre)->
		get();
		
			$uearray=array();
			
			$ueComp=array();
			foreach($ue as $thisUe) 
			{
					$thisUe->description=preg_split("/\\r\\n|\\r|\\n/",$thisUe->description);//je convertie le champ description en tableau une case pour chaque ligne 
				$mat=DB::table('element_constitutif')->//prend les donnée de chaque matiere d'une ue
			where('id_ue',$thisUe->id_ue)->
			get();
			
			
			$ueComp=array('0'=>$thisUe,
						   '1'=>$mat);
			array_push($uearray,$ueComp);	
			
			
			}
	
		array_push($semComp,$thisSem,$uearray);
		array_push($semarray,$semComp);
		
	}
    
	
	
	
	$prof=DB::table('enseignant')->
	

    join('personne','enseignant.id','personne.id')->
		select('enseignant.code_professeur','nom','prenom')->
	get('enseignant.code_professeur','nom','prenom');
	$data=array('semestre'=>$semarray,
				'enseignant'=>$prof,
				'diplome'=>$diplome);
				
				//print_r($data["semestre"]);
 /*semarray ressemble a ca
 ///le tableau contient des tableau de semestre
 chaque semestre contient 2 tableau
 le premier le nom et id du semestre 
 le second le tableau des ue du semestre
 chaque ue comtient 2 tableau 
le premier les description de l'ue 
le second un tableau des matiere
chaque matiere contient les donnée des matiere 
 */
 
	
//	print_r($data);

	
		return view('maquette/creation')->with('data',$data);
	}


	public function index2($diplome)///////Permet de faire la maquette des semestre
	{
		
		//print_r(file(URL::asset('js/maquette.json'))); 
		    $user = Auth::user();
 /*$pro= DB::table('enseignant')->
 select('code_professeur')
 ->where('id',$user->id)
 ->first();*/
	
	
	$d=DB::table('diplome')->
	where('diplome.id_diplome',$diplome)->
	first();
	
	if($d==null)
	return "ce diplome n'existe pas";
	
	/*if($d->code_professeur!=$pro->code_professeur)
		return "vous n'ete pas responsable de ce diplome";*/
		   
		   //print_r($dip);
		    $archive = DB::table('archive_maquette')->/////recupére toute les année du diplome(dans ma bdd la table diplome est similaire a la table diplome de la bdd du projet)
			select('file','annee')->
			where('id_diplome',$diplome)->/////
			get();
	
	$semestre=DB::table('semestre')
	->join('annee','semestre.id_annee','annee.id_annee')
	->join('diplome','diplome.id_diplome','annee.id_diplome')
	->select('semestre.id_semestre','semestre.libelle','diplome.id_diplome')
	->where('diplome.id_diplome',$diplome)
	->get();
	
	
	
	
					//$thisUe->description=preg_split("/\\r\\n|\\r|\\n/",$thisUe->description);//je convertie le champ description en tableau une case pour chaque ligne 
			
    
	
	
//	print_r($archive);
	$prof=DB::table('enseignant')->
	

    join('personne','enseignant.id','personne.id')->
		select('enseignant.code_professeur','nom','prenom')->
	get('enseignant.code_professeur','nom','prenom');
	$data=array('archive'=> addslashes($archive),
				'enseignant'=>$prof,
				'diplome'=>$diplome,
				'semestre'=>$semestre);
				
				//print_r($data["semestre"]);
 /*semarray ressemble a ca
 ///le tableau contient des tableau de semestre
 chaque semestre contient 2 tableau
 le premier le nom et id du semestre 
 le second le tableau des ue du semestre
 chaque ue comtient 2 tableau 
le premier les description de l'ue 
le second un tableau des matiere
chaque matiere contient les donnée des matiere 
 */
 
	
//	print_r($data);

	
		return view('maquette/creation')->with('data',$data);
	}
	
	
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function save(Request $request)//////insert la maquete dans la bdd
{
	$diplome=$request->filiere;
	$diplome=json_decode($diplome);
	print_r($diplome);
	
	
	foreach($diplome as $semestre)////////diplome=diplome
	
	{
			
		$Nsem=$semestre[0];/////////l'id d'u semestre
		
		$tabmat=DB::table('element_constitutif')->///recupere toute les matiere d'un semestre 
			join('ue','ue.id_ue','element_constitutif.id_ue')->
			join('semestre','ue.id_semestre','semestre.id_semestre')->
			where('semestre.id_semestre', $Nsem)->/////
			pluck('id_matiere');
		echo"test";	
		DB::table('element_constitutif')->/////////////et les efface
		wherein('id_matiere',$tabmat)->
		delete();
		
		DB::table('ue')/////efface toute les ue d'un semestre
		->where('id_semestre',$Nsem)->
		delete();
		$sem=0;
		
		foreach($semestre[1] as $arrue)//////pour chaque ue
		{
		
			$ue=$arrue[0];/////////ue contient les détail de cette ue 
			//print_r($ue);
			//echo $sem;
			DB::table('ue')->insert(['id_ue'=>$Nsem.'ue'.$sem,'libelle'=>$ue[0],'id_semestre'=>$Nsem,'coeff'=>$ue[1],'description'=>$ue[2],/*'code_professeur'=>$ue[3],*/'ects'=>$ue[4]]);
			$nmat=0;
			
			
			foreach($arrue[1] as $matiere)//////pour chaque matiere d'une ue
			{//id_matiere'=>$Nsem.'ue'.$sem.'m'.$nmat
				DB::table('element_constitutif')->insert(['libelle'=>$matiere[0],'coeff'=>$matiere[1],'cours'=>$matiere[2],'td'=>$matiere[3],'tp'=>$matiere[4],'id_ue'=>$Nsem.'ue'.$sem]);
				
				$nmat++;//sert pour definir l'id de la matiere c'est le numero de la matiere dans l'ue 
			}
		$sem++;
		}
		
	}
	
	
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function save2(Request $request)//////insert la maquete dans la bdd
{
	
	$diplome=json_decode($request->filiere['detail']);
	if(DB::table('archive_maquette')
	->where([['annee','=',date("Y")],['id_diplome','=',$request->filiere['id_diplome']]])
	->exists())
	{
		DB::table('archive_maquette')
	->where([['annee','=',date("Y")],['id_diplome','=',$request->filiere['id_diplome']]])
	  ->update(['file' =>$request->filiere['detail']]);
	}
	
	else
	
	DB::table('archive_maquette')->insert(['annee'=>date("Y"),'file'=>$request->filiere['detail'],'id_diplome'=>$request->filiere['id_diplome']]);
	
	print_r($diplome);
	
	foreach($diplome as $semestre)////////diplome=diplome
	
	{
			echo"sem";
		$Nsem=$semestre->id_semestre;/////////l'id d'u semestre
		
		$tabmat=DB::table('element_constitutif')->///recupere toute les matiere d'un semestre 
			join('ue','ue.id_ue','element_constitutif.id_ue')->
			join('semestre','ue.id_semestre','semestre.id_semestre')->
			where('semestre.id_semestre', $Nsem)->/////
			pluck('id_matiere');
			
		DB::table('element_constitutif')->/////////////et les efface
		wherein('id_matiere',$tabmat)->
		delete();
		
		DB::table('ue')/////efface toute les ue d'un semestre
		->where('id_semestre',$Nsem)->
		delete();
		$sem=0;
		
		foreach($semestre->ues as $arrue)//////pour chaque ue
		{
		
			$ue=$arrue->ue;/////////ue contient les détail de cette ue 
			//print_r($ue);
			//echo $sem;
			DB::table('ue')->insert(['id_ue'=>$Nsem.'ue'.$sem,'libelle'=>$ue->nom,'id_semestre'=>$Nsem,'coeff'=>$ue->coeff,'description'=>$ue->description,/*'code_professeur'=>$ue[3],*/'ects'=>$ue->ects]);
			$nmat=0;
			echo"test";
			
			foreach($arrue->matieres as $matiere)//////pour chaque matiere d'une ue
			{//id_matiere'=>$Nsem.'ue'.$sem.'m'.$nmat
				DB::table('element_constitutif')->insert(['libelle'=>$matiere->nom,'coeff'=>$matiere->coeff,'cours'=>$matiere->cour,'td'=>$matiere->td,'tp'=>$matiere->tp,'id_ue'=>$Nsem.'ue'.$sem]);
				
				$nmat++;//sert pour definir l'id de la matiere c'est le numero de la matiere dans l'ue 
			}
		$sem++;
		}
		
	}
	
	
	
	
}



























////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function aff($diplome)///sert a afficher les détail d'un diplome,le code est plutot similaire au code d'index
{
	  $annee = DB::table('diplome')->/////recupére toute les année du diplome(dans ma bdd la table diplome est similaire a la table diplome de la bdd du projet)
			join('annee','annee.id_diplome','diplome.id_diplome')->////annee c'est le année de ma bdd
			where('diplome.id_diplome',$diplome)->/////
			pluck('id_annee');
	
	$semestre=DB::table('semestre')->
	select('id_semestre','libelle')->
	wherein('id_annee',$annee)->
	get();
	$semarray=array();
	foreach($semestre as $thisSem)
	{
		$semComp=array();
		$ue=DB::table('ue')->
		join('enseignant','ue.code_professeur','enseignant.code_professeur')->
		join('personne','enseignant.id','personne.id')->
		select('ue.*','nom','prenom')->
		where('id_semestre',$thisSem->id_semestre)->
		get();
		
			$uearray=array();
			
			$ueComp=array();
			foreach($ue as $thisUe)
			{
				$thisUe->description=preg_split("/\\r\\n|\\r|\\n/",$thisUe->description);
				$mat=DB::table('element_constitutif')->
			where('id_ue',$thisUe->id_ue)->
			get();
			
			
			$ueComp=array('0'=>$thisUe,
						   '1'=>$mat);
			array_push($uearray,$ueComp);	
			//print_r(compact($mat));
			
			}
	
		array_push($semComp,$thisSem,$uearray);
		array_push($semarray,$semComp);
		
	}
		return view('maquette/affiche')->with('data',$semarray);

	/*	semarray ressemble a ca
	///le tableau contient des tableau de semestre
 chaque semestre contient 2 tableau
 le premier le nom et id du semestre 
 le second le tableau des ue du semestre
 chaque ue comtient 2 tableau 
le premier les description de l'ue 
le second un tableau des matiere
chaque matiere contient les donnée des matiere 
 */
}
public function test()
{
	return view('maquette/boot');
	//return view('maquette/affiche')
}
}
