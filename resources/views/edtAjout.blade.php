<div id="ajout" class="modal fade" style="min-width: 600px" tabindex="-1" role="dialog">
    <form method="post" action="{{URL::to("edt/ajout")}}" id="form-add">
         {{ csrf_field() }}
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ajout d'une séance</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="py-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <!-- <h1 class="">Cours</h1> -->
                                <!--<h1 class=""><font size="-3">Cours</font></h1>--> 
                                <h1 class=""><font size="6">Nom du cours: </font>
                            </div>
                            <div class="col-md-6">
                                <div class="btn-group">
                                    <select name="matieres" class= "form-control custom-select" required="">
                                            <option value="" selected>Veuillez sélectionner un cours</option>
                                                @foreach ($matieres as $matiere)
                                                <option value="{{$matiere->id_matiere}}" class="dropdown-item" href="#">{{$matiere->libelle}} </option>
                                                @endforeach 
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <h1 class=""><font size="6">Type du cours: </font>
                            </div>
                            <div class="col-md-6">
                                <div class="btn-group">
                                    <select name="type" class= "form-control custom-select" required="">
                                            <option value="" selected>Veuillez sélectionner un type de cours</option>
                                            <option value="Cours"> Cours</option> 
                                            <option value="TD"> TD</option>
                                            <option value="TP"> TP</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <h1 class=""><font size="6">Nom de l'enseignant: </font>
                            </div>
                            <div class="col-md-6">
                                <div class="btn-group">
                                    <select name="code_professeur" class= "form-control custom-select" required="">
                                            <option value="" selected>Veuillez sélectionner un nom d'enseignant</option>
                                                @foreach ($enseignants as $enseignant)
                                                   <option value="{{$enseignant->code_professeur}}" class="dropdown-item" href="#">{{$enseignant->personne->prenom}} {{$enseignant->personne->nom}}</option>
                                                @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <h1 class=""><font size="6">Type de salle: </font>
                            </div>
                            <div class="col-md-6">
                                <div class="btn-group">
                                    <select class= "form-control custom-select" name="salle" required="">
                                            <option value="" selected>Veuillez sélectionner une salle</option>
                                            <@foreach ($salles as $salle)
                                                   <option value="{{$salle->type}}" class="dropdown-item" href="#">{{$salle->type}}</option>
                                                @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <h1 class=""><font size="6">Remarque: </font>
                            </div>
                            <div class="col-md-6">
                                    <input type="remarque" name="remarque" class="form-control"
                                           placeholder="Enter une remarque">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <h1 class=""><font size="6">Heure de début: </font>
                            </div>
                            <div class="col-md-6">
                                    <input required type="time" name="heure_debut" class="form-control"
                                           placeholder="Heure début ex: 08h00"
                                           min="08:00" max="21:30" step="900">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <h1 class=""><font size="6">Heure de fin: </font>
                            </div>
                            <div class="col-md-6">
                                    <input required type="time" name="heure_fin" class="form-control"
                                           placeholder="Heure fin ex: 18h00"
                                           min="08:00" max="21:30" step="900">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <h1 class="" content="true"><font size="6">Date de la séance: </font>
                            </div>
                            <div class="col-md-6">
                                <div id=dateDuplicate class="btn-group">
                                    <input required="" name="date"  class= "form-control" id="date" type="date">
                                    
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <a href="#" id=addDate onclick="duplicateDate()" class="btn btn-outline-primary">+</a>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
            </div>
            <div class="modal-footer">
                <button type="submit" id=addCour class="btn btn-outline-primary">Ajouter</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
    </form>
</div>


@section("script")

<script>
    var i = 0;
    var original = document.getElementById('dateDuplicate');

    function duplicateDate() {
        var clone = original.cloneNode(true); // "deep" clone
        clone.id = "dateDuplicate" + ++i;
        // or clone.id = ""; if the divs don't need an ID
        original.parentNode.appendChild(clone);
    }
    
    document.querySelector("#btAjout").addEventListener("click", function(){
        document.querySelectorAll("select").forEach(function(select){
            select.selectedIndex=0;
        })
       document.querySelectorAll("input.form-control").forEach(function(input){
            input.value="";
        })
    })

</script>
    
@endsection