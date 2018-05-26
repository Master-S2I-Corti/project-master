@extends('layouts.app')



@section('css')
	<link rel="stylesheet" href="{{ URL::asset('css/maquette.css') }}" />
@endsection

@section('content')
<select id="archive" >
<option selected></option>
<?php
foreach (json_decode(stripslashes($data["archive"])) as $annee) {
    echo"<option value='".$annee->annee."'>".$annee->annee."</option>";
}?>
</select>  <button  onclick="archClick()" >charger une maquette des annees précédentes</button>
<br>
</br>
<div id="filiere" class="container-fluid"><!-- les tableau s'afficheront dans cette div au chargement de la page -->
<br>

</div>





@endsection
	
	



@section('script')
<script type="text/javascript" src="{{ URL::asset('js/card.js') }}"></script>
<script>
var table = document.getElementById("previsio");
 var prof=' {!! $data["enseignant"] !!}';
 
 var filiere="{!!addslashes(json_encode($data))!!}";//sans le add slash un probleme se crée lors du passage en js si il y a un saut de ligne */
 var archive='{!! $data["archive"] !!}';
var semestre=' {!! $data["semestre"] !!}'


	 function archClick()
	{
		
		if(document.getElementById("archive").value=="")
			alert("Selctionné une année");
		
		else{
		r=confirm("Vouler vous chargée cette maquette")
	if (r==false)
		return"";
	cardAffiche(JSON.parse(archive),JSON.parse(prof));
	}
	}


</script>	
@endsection
</html>