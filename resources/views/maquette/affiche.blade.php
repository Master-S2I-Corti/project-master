@extends('layouts.app')



@section('css')
	<link rel="stylesheet" href="{{ URL::asset('css/maquette.css') }}" />
@endsection

@section('content')
<br>
<div id="semestre">

</div>



	

</form>





<div id='overlay'>
<button onclick='closeBox()' >Fermer</button>
<br>
<textarea disabled cols='100' rows='20' id='desbox'>test</textarea>
</div>
@endsection
	
	



@section('script')
<script type="text/javascript" src="{{ URL::asset('js/maquette.js') }}"></script>
<script>

 var table = document.getElementById("previsio");
 
 var test= '{!! addslashes(json_encode($data))!!}';
////alert(JSON.parse(prof)[0].nom);
 	/*for(i in test)
	{
alert(i.code_professeur);
	}*/function myFunction()
	{ 
		affSemestre(test);
	
		
	}

document.body.addEventListener("load",myFunction());
</script>	
@endsection
</html>