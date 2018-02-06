@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/annuaire.css') }}"/>
    <style>
        .nav-item:nth-child(3) a {
            color: white !important;
        }
    </style>
@endsection

@section('content')
    <div class="w-75 m-auto pt-5">
        <div class="d-flex justify-content-between mb-5">
            <h2>Liste des étudiants</h2>
            @if(Auth::user()->isAdmin())
                <button class="add btn btn-primary" >Ajouter d'un étudiant <i class="ml-2 d-inline fa fa-plus fa-lg"></i></button>
            @endif
        </div>

        <table class="table table-bordered ">
            <thead>
            <tr>
                <th>#</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Filière</th>
                @if(Auth::user()->isAdmin())
                    <th>Modifier</th>
                    <th>Supprimer</th>
                @endif
            </tr>
            </thead>
            <tbody>
            @if ( isset($listesEtudiant))
            @foreach ( $listesEtudiant as $etudiant)

                @if (  $recherche == null ||  stristr( $etudiant->prenom ,$recherche  ) ||   stristr( $etudiant->nom ,$recherche ) )

                    <tr>
                            <th>{{$etudiant->id}}</th>
                            <th  class="opener">{{$etudiant->nom}}</th>
                            <th  class="opener">{{$etudiant->prenom}}</th>
                            <th  class="opener">{{$etudiant->filiere}}</th>
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
        <?php echo $listesEtudiant->render(); ?> <!-- Nombres de page et redirection de la pagination -->
    </div>

    <!-- POPUP D'AFFICHAGE -->
    <div id="dialog" title="Profil de l' Etudiant" class="modal fade" >
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="nom">Détails étudiant</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <p id="email"> Email: Aucun mail</p>
                        </div>
                        <div class="col">
                            <p id="fil"> Filière: Aucune filiere</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- POPUP DE MODIFICATON -->
    <div id="modif" title="Modification de l' Etudiant" class="modal fade" >
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="post" action="{!! url('updateEtudiant') !!}" accept-charset="UTF-8">

                    <div class="modal-header">
                        <h5 class="modal-title" ><span id="nom2" name="nom"> P </span> <span id="pre2" name="prenom">P</span></h5>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col">
                                    <input id="id2" type="hidden" name="id"  value="" />
                                    <p> Email: <br /></p>
                                </div>
                                <div class="col">
                                    <p> Filière: <input type="text" name="filiere" id="fil2" value=''/><br /></p>
                                </div>
                                <div class="row">
                                    <div class="col">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary"> Modifier</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- POPUP D'AJOUT -->
    <div id="ajout" title="Ajouter de l' Etudiant" class="modal fade">
        <form class="modal-dialog" method="post" action="{!! url('annuaire/etudiants/saveEtudiant') !!}" accept-charset="UTF-8">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Ajouter nouvel étudiant</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                {{ csrf_field() }}
                                <p> Nom: <input type="text" id="nom3" name="nom" value='' required/><br/><br/></p>
                                <p> Prénom: <input type="text" id="pre3" name="prenom" value='' required/><br/><br/></p>
                                <p> Email: <input type="email" id="email3" name="email" value='' required/><br/></p>
                                <p> Date de Naissance :  <input type="date" id="dn3" name="dateNaissance" value='' required/><br/></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary">Ajouter</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                </div>
            </div>

        </form>
    </div>

    <!-- POPUP DE SUPRESSION -->
        <div id="sup" title="Profil de l'etudiant" class="modal fade">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="nom">Suppression de l'Etudiant</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        <div class="container">
                            <h4> Êtes-vous sûr de supprimer <span id="nomS" name="nom"> cet étudiant </span> ?</h4>
                            <div class="row">
                                <div class="col">
                                    <form method="post" action="{{ url('annuaire/etudiants/deleteEtudiant') }}">
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
            //AFFICHAGE POPUP


            $( ".opener" ).on( "click", function(e) {
                var elements = e.target.parentElement.querySelectorAll("th")
                document.querySelector("#nom").innerHTML = elements.item(1).innerHTML +" "+elements.item(2).innerHTML
                document.querySelector("#fil").innerHTML ="Filière: "+ elements.item(3).innerHTML
                $( "#dialog" ).modal('show');
            });

            $( ".modifier" ).on( "click", function(e) {
                var elements = e.target.parentElement.parentElement.querySelectorAll("th")
                document.getElementById("id2").value = elements.item(0).innerHTML
                document.querySelector("#nom2").innerHTML = elements.item(1).innerHTML
                document.querySelector("#pre2").innerHTML = elements.item(2).innerHTML
                document.getElementById("fil2").value = elements.item(3).innerHTML;
                $( "#modif" ).modal( "show" );
            });

            $( ".add" ).on( "click", function(e) {
                /*var elements = e.target.parentElement.parentElement.querySelectorAll("th")
                document.querySelector("#nom3").innerHTML = elements.item(1).innerHTML +" "+elements.item(2).innerHTML
                document.getElementById("fil2").value = elements.item(3).innerHTML;*/
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
