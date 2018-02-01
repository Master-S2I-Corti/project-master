<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \App\semestre;
class MaquetteController extends Controller
{
	public function index()///////Permet de faire la maquette des semestre
	{
		
		   
		   
		   //print_r($dip);
		    $annee = DB::table('diplome')->/////recupére toute les année du diplome(dans ma bdd la table diplome est similaire a la table diplome de la bdd du projet)
			join('annee','annee.id_diplome','diplome.id_diplome')->////annee c'est le année de ma bdd
			where('diplome.id_diplome','1')->/////
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
		/*join('enseignant','ue.responsable_ue','enseignant.code_professeur')->
		join('personne','enseignant.id','personne.id')->
		select('ue.*','nom','prenom')->*/
		where('id_semestre',$thisSem->id_semestre)->
		get();
		
			$uearray=array();
			
			$ueComp=array();
			foreach($ue as $thisUe) 
			{
					$thisUe->description=preg_split("/\\r\\n|\\r|\\n/",$thisUe->description);//je convertie le champ description en tableau une case pour chaque ligne 
				$mat=DB::table('matiere')->//prend les donnée de chaque matiere d'une ue
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
				'enseignant'=>$prof);
				//print_r($data["enseignant"]);
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
	$diplome=$request->diplome;
	$diplome=json_decode($diplome);
	
	
	
	foreach($diplome as $semestre)////////diplome=diplome
	
	{
			
		$Nsem=$semestre[0];/////////l'id d'u semestre
		
		$tabmat=DB::table('matiere')->///recupere toute les matiere d'un semestre 
			join('ue','ue.id_ue','matiere.id_ue')->
			join('semestre','ue.id_semestre','semestre.id_semestre')->
			where('semestre.id_semestre', $Nsem)->/////
			pluck('id_matiere');
			
		DB::table('matiere')->/////////////et les efface
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
			DB::table('ue')->insert(['id_ue'=>$Nsem.'ue'.$sem,'libelle'=>$ue[0],'id_semestre'=>$Nsem,'coeff'=>$ue[1],'description'=>$ue[2],'responsable_ue'=>$ue[3]]);
			$nmat=0;
			
			
			foreach($arrue[1] as $matiere)//////pour chaque matiere d'une ue
			{
				DB::table('matiere')->insert(['id_matiere'=>$Nsem.'ue'.$sem.'m'.$nmat,'libelle'=>$matiere[0],'coeff'=>$matiere[1],'cours'=>$matiere[2],'td'=>$matiere[3],'tp'=>$matiere[3],'id_ue'=>$Nsem.'ue'.$sem]);
				
				$nmat++;//sert pour definir l'id de la matiere c'est le numero de la matiere dans l'ue 
			}
		$sem++;
		}
		
	}
	
	
}


public function aff()///sert a afficher les détail d'un diplome,le code est plutot similaire au code d'index
{
	  $annee = DB::table('diplome')->/////recupére toute les année du diplome(dans ma bdd la table diplome est similaire a la table diplome de la bdd du projet)
			join('annee','annee.id_diplome','diplome.id_diplome')->////annee c'est le année de ma bdd
			where('diplome.responsable_diplome', '1')->/////
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
		join('enseignant','ue.responsable_ue','enseignant.code_professeur')->
		join('personne','enseignant.id','personne.id')->
		select('ue.*','nom','prenom')->
		where('id_semestre',$thisSem->id_semestre)->
		get();
		
			$uearray=array();
			
			$ueComp=array();
			foreach($ue as $thisUe)
			{
				$thisUe->description=preg_split("/\\r\\n|\\r|\\n/",$thisUe->description);
				$mat=DB::table('matiere')->
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
		return view('affiche')->with('data',$semarray);

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

}
