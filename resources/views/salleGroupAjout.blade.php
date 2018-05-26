@extends('layouts.app')



@section('content')

      
                  
            <div class="col-md-6">
              <input type="radio" name="radioBtn" >
              <h3>CREER UN GROUPE DE SALLES </h3>
              <div class="card">
                <div class="card-body p-5">
                  <form action="{{ url('/gestion/salles/add') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group"> <label>L'intervalle :&nbsp;</label> </div>
                    <div class="col-md-12"> 
                      <label>De</label><input type="number" placeholder="0" style="display:inline-block;" class="form-control form-control-lg w-25"> 
                      <label>A</label><input type="number" class="form-control form-control-lg w-25" placeholder="0" style="display:inline-block;"> </div>
                
                      <div class="form-group"> <label>Emplacement</label>
                      <input type="text" class="form-control w-50" name="location" <?php if(isset($data)){echo 'value="'.$data[0]->location.'"';} ?>> </div>
                    <div class="form-group"> <label>Nombre de places disponibles</label>
                      <input type="number" class="form-control w-50" name="capacite" <?php if(isset($data)){echo 'value="'.$data[0]->capacite.'"';} ?>> </div>
                    <div class="form-group"> <label>Nombre de machines</label>
                      <input type="number" class="form-control w-50" name="nbmachine" <?php if(isset($data)){echo 'value="'.$data[0]->nbmachine.'"';} ?>> </div>
                    <div class="form-group"> <label>Type de salle</label>
                      <input type="text" class="form-control w-50" name="type" <?php if(isset($data)){echo 'value="'.$data[0]->type.'"';} ?>> </div>

                      
                  </form>


@endsection