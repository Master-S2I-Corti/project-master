@extends('layouts.app')




@section('content')
<br>



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

 
 var prof=' [{"code_professeur":1,"nom":" andore","prenom":"jerome d"}]';
 
var semestre='[{"id_semestre":"master1s1","libelle":"master1se1","id_diplome":1},{"id_semestre":"master1s2","libelle":"master1s2","id_diplome":1}]'
	
	
	function mFunction2()///fonction s'activant a la création de la table 
	{ 
	

		var sem=JSON.parse(semestre);
		loadSemestre(sem,JSON.parse(prof));
		
		
	}
	
   

	
	
document.addEventListener("load",mFunction2());

</script>
@endsection