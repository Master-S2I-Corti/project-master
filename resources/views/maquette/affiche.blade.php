<html Content-Type: text/html; >


<head>
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="https://pingendo.com/assets/bootstrap/bootstrap-4.0.0-beta.1.css" type="text/css"> </head>
  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>


  </head>

<body onload="myFunction()">
<style>

</style>
<div id="semestre">

</div>


<script>
var get='<?php echo route("charge");?>';
 var table = document.getElementById("previsio");
 
 var test= '{!! addslashes(json_encode($data))!!}';
//alert(JSON.parse(prof)[0].nom);
 	/*for(i in test)
	{
alert(i.code_professeur);
	}*/function myFunction()
	{ 
		affSemestre(test);
	
		
	}

document.body.addEventListener("load",myFunction());
</script>	
	

</form>





<div id='overlay'>
<button onclick='closeBox()' >Fermer</button>
<br>
<textarea disabled cols='100' rows='20' id='desbox'>test</textarea>
</div>

	<script type="text/javascript" src="{{ URL::asset('js/maquette.js') }}"></script>
	<link rel="stylesheet" href="{{ URL::asset('css/maquette.css') }}" />



</body>


</html>