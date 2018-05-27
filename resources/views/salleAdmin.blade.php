@extends('layouts.app')



@section('content')

<!-- <h2>Liste des salles</h2> -->
<div class="row" >
    <form method="POST" action="">
      <div class="input-group mb-3">
        
          <input type="search" placeholder="Numéro salle" id="search" name="search"><i class="fa fa-search" width="150" height="155" ></i>

        
        
      </div>
      </form>
</div>


<div align="right">
  <?php 

    
    if($admin==1)
    {
      ?>
      <a href="{{ url('/gestion/salles/gestion')}}" class="btn btn-primary"><i class="fa fa-lg fa-plus" ></i>Groupe Salles</a>
      <a href="{{ url('/gestion/salles/add')}}" class="btn btn-primary"><i class="fa fa-lg fa-plus" ></i>Une Salle</a>
      <?php
    }
  ?>

</div>
<table class="table table-striped">
  <thead class="thead-dark">
      <tr>
        <!-- <th>Identifiant de la salle</th> -->
        <th>Numéro de la salle</th>
        <th>Emplacement</th>
        <th>Places disponibles</th>
        <th>Nombre de machines</th>
        <th>Type de salle</th>
        <th>Logiciel(s) installé(s)</th>
        <th>Action</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody id="body">
      <?php

      foreach ($listes as $row) {
        echo '<tr>
                 
                <td>'.$row['num_salle'].'</td>
                <td>'.$row['location'].'</td>
                <td>'.$row['capacite'].'</td>
                <td>'.$row['nbmachine'].'</td>
                <td>'.$row['type'].'</td>
                <td>'.$row['logiciel'].'</td>
                <td><a href="';  echo url("/gestion/salles/edt/{$row['id_salle']}"); echo '"><i class="fa fa-lg fa-pencil-alt" style="color:black;"></i></a></td>
                <td><a href="';  echo url("/gestion/salles/del/{$row['id_salle']}"); echo '"><i class="fa fa-lg fa-trash" style="color:red;"></i></a></td>
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
$('body').on('keyup', '#search', function(){

var search= $('#search').val();



           $.post('search',{search:search},

                function(data){

                    $('#body').html(data);
                },
                'html'   
            );

   });

 });
 </script>
@endsection