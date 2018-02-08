
@extends('layouts.app')



@section('content')

    <div id="dimGest" class="w-75 m-auto py-5">
        <div class="d-flex justify-content-between mb-5">
            <h2>Liste des enseignants</h2>
            @if(Auth::user()->isAdmin())
                <button class="add btn btn-primary" >Ajouter d'un professeur : <i class="ml-2 d-inline fa fa-plus fa-lg"></i></button>
            @endif
        </div>
        <table class="table table-bordered ">
            <thead>
            <tr>
                    <th></th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Département</th> <!--Faire forme de tag -->
                    @if(Auth::user()->isAdmin())
                        <th>Modifier</th>
                        <th>Supprimer</th>
                    @endif
            </tr>
            </thead>
            <tbody>
            @if ( isset($listesEnseignant))
            @foreach ( $listesEnseignant as $enseignant)

                @if (  $recherche == null ||  stristr( $enseignant->prenom ,$recherche  ) ||   stristr( $enseignant->nom ,$recherche ) )

                    <tr>
                            <th>{{$enseignant->id}}</th>
                            <th  class="opener">{{$enseignant->nom}}</th>
                            <th  class="opener">{{$enseignant->prenom}}</th>
                            <th  class="opener">{{$enseignant->departement}}</th>
                            @if(Auth::user()->isAdmin())
                            <th class="modifier" ><i class="fa fa-edit fa-2x"></i></th>
                            <th class="del"><i class="fa fa-trash fa-2x"></i></th>
                            @endif
                    </tr>
                @endif
            @endforeach
        @endif
            </tbody>
        </table>
       <?php echo $listesEnseignant->render(); ?> <!-- Nombres de page et redirection de la pagination -->
    </div>

    <!-- POPUP Affichage -->
    <div id="dialog" class="modal fade">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="nom">Profil de l' Etudiant</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        <div class="container">
                            <h1 id="nom">Prof</h1>
                            <div class="row">
                                <div class="col">
                                    <p> Compétences: </p>
                                    <p> - Modules en charges : </p>
                                    <p> - Matières enseignées: </p>
                                </div>
                                <div class="col">
                                    <p> Professeur pédagogique : </p>
                                    <p> Email: </p> 
                                    <!--<p id="dep"> Département: </p> -->
                                    <p> Bureau N°: </p></div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>

 <!-- POPUP DE MODIFICATON -->
    <div id="modif"  class="modal fade">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="nom">Profil de l' Etudiant</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        <div class="container">
                            <form method="post" action="{!! url('updateProf') !!}" accept-charset="UTF-8">
                                {{ csrf_field() }}
                                <h1><span id="nom2" name="nom"> P </span> <span id="pre2" name="prenom">P</span></h1>
                                <div class="row">
                                    <div class="col">
                                        <input id="id2" type="hidden" name="id" value=""/>
                                        <p> Compétences: </p>
                                        <p> - Modules en charges : </p>
                                        <p> - Matières enseignées: </p>
                                    </div>
                                    <div class="col">
                                        <p> Professeur pédagogique : </p>
                                        <p> Email: <input type="text" name="mail" id="mail" value=''/><br/></p>
                                        <p> Département: <input type="text" name="departement" id="dep2" value=''/><br/>
                                        </p>
                                        <p> Bureau N°: <input type="text" name="numbur" id="nb" value=''/><br/> </p></div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <button class="btn btn-primary"> Modifier</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                </div>
            </div>
        </div>
    </div>

 <!-- POPUP D'AJOUT -->
    <div id="ajout" class="modal fade">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="nom">Ajouter de l'enseignant</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        <div class="container">
                            <form method="post" action="{!! url('annuaire/professeurs/saveProf') !!}" accept-charset="UTF-8">
                                {{ csrf_field() }}
                                <p> Nom: <input type="text" id="nom3" name="nom" value='' required/><br/><br/></p>
                                <p> Prénom: <input type="text" id="pre3" name="prenom" value='' required/><br/><br/></p>
                                <p> Email: <input type="email" id="email3" name="email" value='' required/><br/></p>
                                <p> Date de Naissance :  <input type="date" id="dn3" name="dateNaissance" value='' required/><br/></p>
                                <div class="row">
                                    <div class="col">
                                        <button class="btn btn-primary">Ajouter</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                </div>
            </div>
        </div>
    </div>

 <!-- POPUP DE SUPRESSION -->
    <div id="sup" title="Profil de l'enseignant" class="modal fade">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="nom">Suppression de l'enseignant</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        <div class="container">
                            <h4> Êtes-vous sûr de supprimer <span id="nomS" name="nom"> cet enseignant </span> ?</h4>
                            <div class="row">
                                <div class="col">
                                    <form method="post" action="{{ url('annuaire/professeurs/deleteProf') }}">
                                        {{ csrf_field() }}
                                        <input id="idS" type="hidden" name="id" value=""/>
                                        <button class="btn btn-danger">Confirmer</button>
                                    </form>
                                </div>
                                <div class="col">
                                    <button>Annuler</button>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $( function() {

            $( ".opener" ).on( "click", function(e) {
                var elements = e.target.parentElement.querySelectorAll("th")
                document.querySelector("#nom").innerHTML = elements.item(1).innerHTML +" "+elements.item(2).innerHTML
                document.querySelector("#dep").innerHTML ="Département: "+ elements.item(3).innerHTML
                $( "#dialog" ).modal( "show" );
            });

            $( ".modifier" ).on( "click", function(e) {
                var elements = e.target.parentElement.parentElement.querySelectorAll("th")
                document.getElementById("id2").value = elements.item(0).innerHTML
                document.querySelector("#nom2").innerHTML = elements.item(1).innerHTML
                document.querySelector("#pre2").innerHTML = elements.item(2).innerHTML
                document.getElementById("dep2").value = elements.item(3).innerHTML;
                $( "#modif" ).modal( "show" );
            });

            $( ".add" ).on( "click", function(e) {
                //var elements = e.target.querySelectorAll("button")
                //document.querySelector("#nom2").innerHTML = elements.item(1).innerHTML +" "+elements.item(2).innerHTML
                // document.getElementById("dep2").value = elements.item(3).innerHTML;
                $( "#ajout" ).modal( "show" );
            });

            $( ".del" ).on( "click", function(e) {
                var elements = e.target.parentElement.parentElement.querySelectorAll("th")
                document.getElementById("idS").value = elements.item(0).innerHTML
                document.querySelector("#nomS").innerHTML = elements.item(1).innerHTML +" "+elements.item(2).innerHTML;
                $( "#sup" ).modal( "show" );
            });

        } );

    </script>
@endsection