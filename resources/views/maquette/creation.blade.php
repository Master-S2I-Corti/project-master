@extends('layouts.app')



@section('content')
<button onclick="delAll()">Suprimer toute les Ue et matiere </button>
<div id="semestre"><!-- les tableau s'afficheront dans cette div au chargement de la page -->

</div>



	
<button id="postB" >Modifier le semestre </button><!--Bouton servant a enregistre la requete-->

	

<br><br>





</div>
<div id='overlay'><!--le pop ud qui s'affiche lorsque l'on click sur une textarrea de la colone "detail (si tu veux le desactive va dans le json et met en com les fonction open et close box va aussi dans le css pour supprimer le resize:none de la class detail--> 
<button onclick='closeBox()' >Fermer</button>
<br>
<textarea cols='100' rows='20' id='desbox'>test</textarea>
</div>

	

<div id='popup' >


</div>
@endsection

@section('css')
	<link rel="stylesheet" href="{{ URL::asset('css/maquette.css') }}" />
@endsection
@section('script')
<script type="text/javascript" src="{{ URL::asset('js/maquette.js') }}"></script>
<script>

 var table = document.getElementById("previsio");
 var prof=' {!! $data["enseignant"] !!}';
 
 var filiere="{!!addslashes(json_encode($data))!!}";//sans le add slash un probleme se crée lors du passage en js si il y a un saut de ligne 
 

	function myFunction()///fonction s'activant a la création de la table 
	{ 
		getSemestre(filiere);///affiche les donné
		for(var i=0;i<document.getElementsByClassName("newue").length;i++)
		{
			
			document.getElementsByClassName("newue")[i].addEventListener("click",function()/////ajoute un event listener qui crée un nouvelle row pour les ue une row pour la matiere attachée a cette row
				{
					table=this.parentElement.parentElement.parentElement.parentElement;//table est le tableau du semestre du bouton
					newue(JSON.parse(prof),table)
					lastRow=table.rows[table.rows.length-1];
					
					newmat(lastRow);
				})
		}
	}
 $("#postB").click(function(){////////fonction de la requete ajax pour enregistrer la maquete  dans la bdd 
         var send=getjson();////send est un tableau la premiere case indique si il n'y a pas d'erreur dans notre maquete si elle est a un aucune erreur n'a ete detectée
							//la seconde case est le json de la maquete si il n'ya pas d'erreur si il y en a lors c'est le message d'erreur a affichér
		 
		 
		 if(send[0]==1)
		 {
			 $.ajax({
				   type:'POST',
				   url:'maquette/save',
					 headers: {
			'X-CSRF-TOKEN': '<?php echo csrf_token(); ?>'
			
			  },
			  //data:,
			   data: {'filiere' : send[1]},
			 // dataType: 'JSON',
			success:function(msg,data, settings) {
					alert('La maquète a été enregistrée');
								},
			error:function(){	alert('Erreur');}	
					
				   
				});
		 }
		else if(send[1]!=null)
			alert(send[1]);
		
		
	});
	
	
document.body.addEventListener("load",myFunction());


</script>
@endsection