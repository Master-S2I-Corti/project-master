
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
                    <th>Département</th>
                    @if(Auth::user()->isAdmin())
                        <th>Modifier</th>
                        <th>Supprimer</th>
                    @endif
            </tr>
            </thead>
            <tbody>
            @if ( isset($listesEnseignant))
                @foreach ( $listesEnseignant as $enseignant)

                        <tr>
                                <th>{{$enseignant->id}}</th>
                                <th  class="opener" data-target="#affichage">{{$enseignant->nom}}</th>
                                <th  class="opener" data-target="#affichage">{{$enseignant->prenom}}</th>
                                <th  class="opener" data-target="#affichage">{{$enseignant->departement}}</th>
                                @if(Auth::user()->isAdmin())
                                <th class="modifier" ><i class="fa fa-edit fa-2x"></i></th>
                                <th class="del"><i class="fa fa-trash fa-2x"></i></th>
                                @endif
                        </tr>
                
                @endforeach
            @endif
            </tbody>
        </table>
       <?php echo $listesEnseignant->render(); ?> <!-- Nombres de page et redirection de la pagination -->
    </div>

    <!-- POPUP Affichage -->
    <div id="affichage" class="modal fade">
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
        <div class="modal-dialog modal-lg" role="document">
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
                                <div class="row">
                                    <div class="col-md-4">
                                        {{ csrf_field() }}
                                        <p> Nom: <input type="text" name="nom" value='' required/><br/></p>
                                        <p> Date de Naissance :  <input type="date" name="naissance" value='' required/><br></p>
                                    </div>
                                    <div class="col-md-2">

                                    </div>
                                    <div class="col-md-4">
                                        <p> Prénom: <input type="text" name="prenom" value='' required/><br/><br/><br></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <p> Adresse : <input type="text" name="adresse" value='' required/><br/></p>
                                        <p> Code Postal :  <input type="text" name="codePostal" value='' required/><br/></p>
                                        <p> Ville :  <input type="text" name="ville" value='' required/><br/></p>
                                    </div>
                                    <div class="col-md-2">

                                    </div>
                                    <div class="col-md-4">
                                        
                                        <p> Numéro de télephone : <input type="text" name="tel" value='' required/><br/></p>
                                        <p> Email: <input type="email"  name="email" value='' required/><br/></p>
                                        <p> Email de Secours: <input type="email"  name="emailSos" value='' required/><br/></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                    <p> Fonction :
                                        <select name="fonction">
                                                <option value="Professeur">Professeur</option>
                                                <option value="Maitre de Conferences">Maitre de Conférences</option>
                                                <option value="ATER">ATER</option>
                                                <option value="1/2 ATER">1/2 ATER</option>
                                                <option value="PAST">PAST</option>
                                                <option value="PRAG">PRAG</option>
                                                <option value="Vacataire">Vacataire</option>
                                        </select> 
                                    </p> 
                                    <p> Responsablité :
                                        <select class="Responsabilie" name="Responsabilie">
                                            <option value="0">Aucune</option>
                                        @if ( isset($listeResponsabilite))
                                            @foreach ( $listeResponsabilite as $respo)
                                                    <option value="{{$respo->id_reponsabilite}}">{{$respo->libellle}}</option>
                                            @endforeach
                                        @endif
                                        </select> 
                                    </p> 
                                    </div>
                                    <div class="col-md-2">

                                    </div>
                                    <div class="col-md-4">
                                        <p> Département :
                                            <select class="departement" name="departement">
                                            @if ( isset($listeDepartement))
                                                @foreach ( $listeDepartement as $departement)
                                                        <option value="{{$departement->id_departement}}">{{$departement->libelle}}</option>
                                                @endforeach
                                            @endif
                                            </select> 
                                        </p> 
                                        
                                        <p> Bureau N°: <input type="text" name="numeroBureau" value='' /><br/> </p>
                                    </div>
                                </div>
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
               
                $( "#affichage" ).modal( "show" );
            });

            $( ".modifier" ).on( "click", function(e) {
                
                $( "#modif" ).modal( "show" );
            });

            $( ".add" ).on( "click", function(e) {
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