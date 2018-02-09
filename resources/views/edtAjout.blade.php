<div id="ajout" class="modal fade" style="min-width: 600px" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ajout cours</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="py-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <h1 class="">Cours</h1>
                            </div>
                            <div class="col-md-6">
                                <div class="btn-group">
                                    <button class="btn btn-outline-primary dropdown-toggle" data-toggle="dropdown">
                                        Nom_Cours
                                    </button>
                                    <div class="dropdown-menu">
                                        @foreach ($matieres as $matiere)
                                            <a class="dropdown-item" href="#">{{$matiere->libelle}} </a>
                                        @endforeach 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <h1 class="">Type_Cours</h1>
                            </div>
                            <div class="col-md-6">
                                <div class="btn-group">
                                    <button class="btn btn-outline-primary dropdown-toggle" data-toggle="dropdown">
                                        Type
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">Cours</a>
                                        <a class="dropdown-item" href="#">TD</a>
                                        <a class="dropdown-item" href="#">TP</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <h1 class="">Enseignant</h1>
                            </div>
                            <div class="col-md-6">
                                <div class="btn-group">
                                    <button class="btn btn-outline-primary dropdown-toggle" data-toggle="dropdown">
                                        Nom_Enseignant
                                    </button>
                                    <div class="dropdown-menu">
                                        @foreach ($enseignants as $enseignant)
                                            <a class="dropdown-item" href="#">{{$enseignant->personne->prenom}} {{$enseignant->personne->nom}}</a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <h1 class="">Salle</h1>
                            </div>
                            <div class="col-md-6">
                                <div class="btn-group">
                                    <button class="btn btn-outline-primary dropdown-toggle" data-toggle="dropdown">
                                        Salle
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">informatique</a>
                                        <a class="dropdown-item" href="#">classique</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <h1 class="">Remarque</h1>
                            </div>
                            <div class="col-md-6">
                                <form class="form-inline" method="post" action="https://formspree.io/">
                                    <input type="remarque" name="remarque" class="form-control"
                                           placeholder="Enter une remarque"></form>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <h1 class="">Heure de début</h1>
                            </div>
                            <div class="col-md-6">
                                <form class="form-inline" method="post" action="https://formspree.io/">
                                    <input type="heure_debut" name="heure_debut" class="form-control"
                                           placeholder="heure_debut"></form>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <h1 class="">Heure de fin</h1>
                            </div>
                            <div class="col-md-6">
                                <form class="form-inline" method="post" action="https://formspree.io/">
                                    <input type="heure_fin" name="heure_fin" class="form-control"
                                           placeholder="heure_fin"></form>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <h1 class="" content="true">Date</h1>
                            </div>
                            <div class="col-md-6">
                                <div id=dateDuplicate class="btn-group">
                                    <input id="date" type="date">
                                    
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
                <div class="py-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <a href="#" class="btn btn-outline-primary">Ajouter</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Save changes</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
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
</script>
    
@endsection