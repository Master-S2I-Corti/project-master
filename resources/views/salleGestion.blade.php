
@extends('layouts.app')



@section('content')


    <div class="py-5">
    <div class="container">
      <div class="row" style="border-right:5px">
        <div class="col-md-12">
          <center><div class="row" >
            <div class="col-md-6">
              
              <h3>CREER UN GROUPE DE SALLES </h3>
              <div class="card">
                <div class="card-body p-5">
                  <form action="{{ url('/gestion/salles/group') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group"> <label>L'intervalle :</label> </div>
                    <div class="col-md-12"> 
                      <label>De</label><input type="number" placeholder="111" name="de" style="display:inline-block;" class="form-control form-control-lg w-25"> 
                      <label>A</label><input type="number" class="form-control form-control-lg w-25" placeholder="113" name="a" style="display:inline-block;"> </div></br>
                
                      <div class="form-group"> <label>Emplacement</label>
                      <!-- <input type="text" class="form-control w-50" name="location" <?php if(isset($data)){echo 'value="'.$data[0]->location.'"';} ?>> --> 
                      <select id="monselect" name="location">
                          <option value="UFR Droit">UFR Droit, sciences sociales, économiques et de gestion</option> 
                          <option value="FST" selected>Faculté des Sciences et techniques</option>
                          <option value="FL">Faculté des Lettres, langues, arts, sciences humaines et sociales</option>
                          <option value="ESPE">École Supérieure du Professorat et de l’Éducation</option>
                          <option value="IAE de Corse">Ecole universitaire de management</option>
                          <option value="IUS">Institut Universitaire de Santé</option>
                          <option value="IUT">Institut Universitaire de Technologie</option>
                          <option value="ÉDES">École doctorale Environnement et Société</option>
                        </select></div>
                    <div class="form-group"> <label>Nombre de places disponibles</label>
                      <input type="number" class="form-control w-50" name="capacite" <?php if(isset($data)){echo 'value="'.$data[0]->capacite.'"';} ?>> </div>
                    <div class="form-group"> <label>Nombre de machines</label>
                      <input type="number" class="form-control w-50" name="nbmachine" <?php if(isset($data)){echo 'value="'.$data[0]->nbmachine.'"';} ?>> </div>
                    <div class="form-group"> <label>Type de salle</label>
                      <input type="text" class="form-control w-50" name="type" <?php if(isset($data)){echo 'value="'.$data[0]->type.'"';} ?>> </div>
                      <div class="form-group"> <label>Logiciels installés</label>
                      <p><select name="logiciel" multiple>
                          <option value="NetBeans">NetBeans</option> 
                          <option value="CodeBlocks">CodeBlocks</option>
                          <option value="Android Studio">Android Studio</option>
                          <option value="Microsoft Word 2016">Microsoft Word 2016</option>
                          <option value="Microsoft Excel 2016">Microsoft Excel 2016</option>
                          <option value="Eclipse Java Neon">Eclipse Java Neon</option>
                        </select><p>
                        <button type="submit" class="btn btn-success">VALIDER</button>
                <button type="reset" class="btn btn-danger">ANNULER</button>
                      
                  </form>
              </div>
          
</center>

    
          </div>
        </div>
        
      </div>
    </div>
  </div>
</div>
      </div>
  </div>

@endsection

