@extends('layouts.app')




@section('content')
<br>

<select id="archive" >
<option selected></option>
<?php
foreach (json_decode(stripslashes($data["archive"])) as $annee) {
    echo"<option value='".$annee->annee."'>".$annee->annee."</option>";
}?>
</select>  <button id="archbut" onclick="archClick" >charger une maquette des annees précédentes</button>
<br>
</br>
<button onclick="deleteAll()" class="delB">Suprimer toute les Ue et matiere </button>
<br>
<div id="filiere" class="container-fluid"><!-- les tableau s'afficheront dans cette div au chargement de la page -->
<br>
<!--Nom du semestre
<div class="card">
  <div class="card-body">  
  <table>
		<tr>
			<td>
			nom de l'ue
			</td>
			<td>
			descriptio
			</td>
			<td>
			coeficient
			</td>
		</tr>
		<tr>
			<td>
			 <input type="text">
			</td>
			<td>
			 <input type="text">
			</td>
			<td>
			 <input type="text">
			</td>
		</tr>
		<tr>
			<td>
			nom de la matiere
			</td>
			<td>
			coeff
			</td>
			<td>
			heure
			</td>
		</tr>
		<tr>
			<td>
			 <input type="text">
			</td>
			<td>
			 <input type="text">
			</td>
			<td>
			 <input type="text">
			</td>
		</tr>
		<tr>
			<td>
			 <input type="text">
			</td>
			<td>
			 <input type="text">
			</td>
			<td>
			 <input type="text">
			</td>
		</tr>
	  </table></div>
</div>
	
 <div class="card">
  <div class="card-body">  
  <table>
		<tr>
			<td>
			nom de l'ue
			</td>
			<td>
			descriptio
			</td>
			<td>
			coeficient
			</td>
		</tr>
		<tr>
			<td>
			 <input type="text">
			</td>
			<td>
			 <input type="text">
			</td>
			<td>
			 <input type="text">
			</td>
		</tr>
		<tr>
			<td>
			nom de la matiere
			</td>
			<td>
			coeff
			</td>
			<td>
			heure
			</td>
		</tr>
		<tr>
			<td>
			 <input type="text">
			</td>
			<td>
			 <input type="text">
			</td>
			<td>
			 <input type="text">
			</td>
		</tr>
		<tr>
			<td>
			 <input type="text">
			</td>
			<td>
			 <input type="text">
			</td>
			<td>
			 <input type="text">
			</td>
		</tr>
	  </table></div>
</div> 
<!--Bouton servant a enregistre la requete-->
</div>



	
<button id="postB" >Modifier la maquette </button>

	

<br><br>






@endsection
@section('css')
	<link rel="stylesheet" href="{{ URL::asset('css/maquette.css') }}" />
@endsection
@section('script')
<script type="text/javascript" src="{{ URL::asset('js/card.js') }}"></script>
<script>

 var table = document.getElementById("previsio");
 var prof=' {!! $data["enseignant"] !!}';
 
 var filiere="{!!addslashes(json_encode($data))!!}";//sans le add slash un probleme se crée lors du passage en js si il y a un saut de ligne */
 var archive='{!! $data["archive"] !!}';
var semestre=' {!! $data["semestre"] !!}'
	
	
	function mFunction2()///fonction s'activant a la création de la table 
	{ 
	

		var sem=JSON.parse(semestre);
		loadSemestre(sem,JSON.parse(prof));
		
		
	}
	 function archClick()
	{
		
		if(document.getElementById("archive").value=="")
			alert("Selctionné une année");
		
		else{
		r=confirm("Vouler vous chargée cette maquette")
	if (r==false)
		return"";
	loadArchive(JSON.parse(archive),JSON.parse(prof));
	}
	}
   
 /*$("#postB").click(function(){////////fonction de la requete ajax pour enregistrer la maquete  dans la bdd 
         var send=getjson();////send est un tableau la premiere case indique si il n'y a pas d'erreur dans notre maquete si elle est a un aucune erreur n'a ete detectée
							//la seconde case est le json de la maquete si il n'ya pas d'erreur si il y en a lors c'est le message d'erreur a affichér
		
		 
		if(send[0]==1)
		 {
			  var data={id_diplome:JSON.parse(filiere).diplome,
			  detail:send[1]
			  };
			console.log(send[1]);
			 $.ajax({
				   type:'POST',
				   url:'save2',
					 headers: {
			'X-CSRF-TOKEN': '<?php echo csrf_token(); ?>'
			
			  },
			  //data:,
			   data: {'filiere' : data},
			 // dataType: 'JSON',
			success:function(msg,data, settings) {
					alert('La maquète a été enregistrée');
								},
			error:function(){	alert('Erreur');}	
					
				   
				});
		 }
		else if(send[1]!=null)
			alert(send[1]);
		var car = {type:"Fiat", model:"500", color:["yellow","red"]};
		
	
		
	});*/
	
	
document.addEventListener("load",mFunction2());

</script>
@endsection