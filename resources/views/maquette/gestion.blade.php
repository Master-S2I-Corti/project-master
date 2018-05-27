@extends('layouts.app')




@section('content')

        <div class="py-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>Liste des filières</h1>
                    </div>
                </div>
            </div>
        </div>
<?php 

foreach($data as $diplome){
//print_r(url('maquette'));
print_r($diplome->libelle);
echo"<span  class='modifier'><i class='fa fa-fw fa-edit fa-2x text-dark my-1' title='Modifier' style='cursor: pointer ' onclick='modif(this)' id=$diplome->id_diplome></i></span> ";
echo"<span ><i id=$diplome->id_diplome class='fa fa-fw fa-2x text-dark fa-info-circle my-1'  style='cursor: pointer' onclick='aff(this)'></i></span> ";
echo"<br>";}

?>
<script>
function modif(id)
{
	
	 window.location.assign("{{url('maquette') }}/"+id.id);
}
function aff(id)
{

	window.location.assign("{{url('maquette/affichage') }}/"+id.id);
}
</script>        


@endsection
@section('css')
	<link rel="stylesheet" href="{{ URL::asset('css/maquette.css') }}" />
@endsection