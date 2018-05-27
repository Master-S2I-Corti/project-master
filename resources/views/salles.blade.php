@extends('layouts.app')



@section('content')
<div style="text-align: center">
   <h2>Liste des salles</h2>
</div>
        
        
    <div class="row" >
    <form method="POST" action="">
      <div class="input-group mb-3">
        
          <input type="search" placeholder="Numéro salle" id="searched" name="search"><i class="fa fa-search" width="150" height="155" ></i>
          
        
      </div>
      </form>
</div>
			<table class="table table-striped">
  				<thead class="thead-dark">
			      <tr>
			       
			        <th>Numéro de la salle</th>
			        <th>Emplacement</th>
			        <th>Places disponibles</th>
			        <th>Nombre de machines</th>
			        <th>Type de salle</th>
              <th>Logiciel(s) installé(s)</th>
			      </tr>
			    </thead>
          <tbody id="body">
      		<?php
        
      		foreach ($affich as $row) {
       		 echo '<tr>
                <td>'.$row['num_salle'].'</td>
                <td>'.$row['location'].'</td>
                <td>'.$row['capacite'].'</td>
                <td>'.$row['nbmachine'].'</td>
                <td>'.$row['type'].'</td>
                <td>'.$row['logiciel'].'</td>
              		</tr>';
      }
          
      		?>
        </tbody>
    	</table>
@endsection
@section('script')
 <script>
  $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
   $('document').ready(function(){
$('body').on('keyup', '#searched', function(){

var searched= $('#searched').val();



           $.post('searched',{searched:searched},

                function(data){

                    $('#body').html(data);
                },
                'html'   
            );

   });

 });
 </script>
@endsection