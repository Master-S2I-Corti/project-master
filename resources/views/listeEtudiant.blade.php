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
            <div class="col-md">
                <h2>Liste des étudiants</h2>
            </div>
            @if(Auth::user()->isAdmin())
                <div class="col-md">
                    <button class="add btn btn-primary">Ajout d'un étudiant <i class="ml-2 d-inline fa fa-plus fa-lg"></i></button>
                </div>
                <div class="col-md">
                    <form method="post" action="{!! url('annuaire/etudiants/saveEtudiants') !!}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="file" name="fichier" accept=".csv"/>
                        <button class="btn btn-primary">Ajout du fichier <i class="ml-2 d-inline fa fa-plus fa-lg"></i></button>
                    </form>
                </div>
            @endif
        </div>
        @if(session()->has("ok"))
            <div class="alert alert-success alert-dismissible">
                {!! session('ok') !!}
            </div>
        @elseif (session()->has("error"))
            <div class="alert alert-danger alert-dismissible">
                {!! session('error') !!}
        @endif
            <div class="card">
                <h3>Recherche de l'étudiant</h3>
                <form method="post" action="{!! url('annuaire/etudiants/search') !!}" accept-charset="UTF-8">
                    <div class="modal-body">
                            <div class="row">
                            {{ csrf_field() }}
                                <div class="col-md">
                                    <p> Nom : <input class="form-control form-control-sm" type="text" name="nom" value='' /><br/></p>
                                    </div>
                                <div class="col-md">
                                    <p> Prénom : <input class="form-control form-control-sm" type="text" name="prenom" value='' /><br/></p>
                                </div>
                                <div class="col-md-2">
                                <label>Filière : </label></br>
                                    <label class="checkbox-inline"><input type="checkbox" name="filiere[]" value="DUT">DUT</label>
                                    <label class="checkbox-inline"><input type="checkbox" name="filiere[]" value="LICENCE 1">L1</label>
                                    <label class="checkbox-inline"><input type="checkbox" name="filiere[]" value="LICENCE 2">L2</label>
                                    <label class="checkbox-inline"><input type="checkbox" name="filiere[]" value="LICENCE 3">L3</label>
                                    <label class="checkbox-inline"><input type="checkbox" name="filiere[]" value="MASTER 1">M1</label>
                                    <label class="checkbox-inline"><input type="checkbox" name="filiere[]" value="MASTER 2">M2</label> 
                                    <label class="checkbox-inline"><input type="checkbox" name="filiere[]" value="DOCTORAT">DOCTORAT</label>
                                </div>
                                
                                <div class="col-md-2">
                                <p>Département :
                                        <select class="form-control form-control-sm" name="departement">
                                        @if ( isset($listeDepartement))
                                            @foreach ( $listeDepartement as $departement)
                                                    <option value="{{$departement->id_departement}}">{{$departement->libelle}}</option>
                                            @endforeach
                                        @endif
                                        </select> 
                                </p>
                                </div>
                                <div class="col-md">
                                </br>
                                    <button class="btn btn-primary">Rechercher </button>
                                </div>
                            </div>
                    </div>
                </form>



        <table class="table table-bordered ">
            <thead>
            <tr>
                <th></th>
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
                    <tr>
                            <td>{{$etudiant->id}}</td>
                            <td  class="opener">{{$etudiant->identity->nom}}</td>
                            <td  class="opener">{{$etudiant->identity->prenom}}</td>
                            <td  class="opener">{{$etudiant->annee[0]->diplome->niveau."  ".$etudiant->annee[0]->libelle[0]."  ".$etudiant->annee[0]->diplome->libelle}}</td>
                            @if(Auth::user()->isAdmin())
                            <td class="modifier" ><i class="fa fa-edit fa-2x"></i></td>
                            <td class="del"><i class="fa fa-trash fa-2x"  style="color:red"></i></td>
                        @endif
                    </tr>

                @endforeach
            @endif
            </tbody>
        </table>
    {{ $listesEtudiant->render() }} <!-- Nombres de page et redirection de la pagination -->
    </div>

    <!-- POPUP D'AFFICHAGE -->
    <div id="dialog" title="Profil de l' Etudiant" class="modal fade" >
        <div class="modal-dialog modal-lg" role="document">
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
                            <p id="email"> Email: Aucun </p>
                            <p id="fil"> Filière: Aucune filiere</p>
                        </div>
                        <div class="col">
                            <p id="filObtenu"> Filière Obtenu : Aucune </p> 
                            <p id="filHorsObtenu"> Diplome Obtenu hors campus: Aucune </p> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- POPUP DE MODIFICATON -->
    <div id="modif" title="Modification de l' Etudiant" class="modal fade" >
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" ><span id="nom2" name="nom"> P </span> <span id="pre2" name="prenom">P</span></h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="{!! url('annuaire/etudiants/updateEtudiant') !!}" accept-charset="UTF-8">
                    <div class="modal-body">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-5">
                                <input id="id2" type="hidden" name="id" value="" />
                                <p> Email: <input class="form-control form-control-md" type="email"  name="email" id="email2" value='' required/><br /></p>
                            </div>
                            <div class="col-md-2">

                            </div>
                            <div class="col-md-5">
                                <!--<p> Filière: <input class="form-control form-control-md" type="text" name="filiere" id="fil2" value='' /><br /></p>-->
                                <p>Filière :
                                    <select class="form-control form-control-sm" name="filiere" id="fil2">
                                        @if ( isset($listDiplome))
                                            @foreach ( $listDiplome as $value)
                                                <option value="{{$value->id_annee}}">{{$value->diplome->niveau."  ".$value->libelle[0]."  ".$value->diplome->libelle}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </p>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary"> Modifier</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- POPUP D'AJOUT -->
    <div id="ajout" title="Ajouter de l' Etudiant" class="modal fade" >
        <form class="modal-dialog modal-lg" method="post" action="{!! url('annuaire/etudiants/saveEtudiant') !!}" accept-charset="UTF-8">
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
                            <div class="col-md-4">
                                {{ csrf_field() }}
                                <p> Nom: <input class="form-control form-control-sm" type="text" name="nom" value='' required/><br/></p>
                                <p> Date de Naissance :  <input class="form-control form-control-sm" type="date" name="naissance" value='' required/><br></p>
                            </div>
                            <div class="col-md-2">

                            </div>
                            <div class="col-md-4">
                                <p> Prénom: <input class="form-control form-control-sm" type="text" name="prenom" value='' required/><br/><br/><br></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <p> Email de Secours: <input class="form-control form-control-sm" type="email"  name="emailSos" value='' required/><br/></p>
                                <p> Adresse : <input class="form-control form-control-sm" type="text" name="adresse" value='' required/><br/></p>
                            </div>
                            <div class="col-md-2">
  num = i;
                            </div>
                            <div class="col-md-4">
                                <p> Numéro de télephone : <input class="form-control form-control-sm" type="tel" name="tel" placeholder="04 23 45 67 89" value='' required pattern="^0[1-68]([-. ]?[0-9]{2}){4}$"/><br/></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <p> Code Postal :  <input class="form-control form-control-sm" type="number" name="codePostal" value='20000' required/><br/></p>
                                
                            </div>
                            <div class="col-md-2">

                            </div>
                            <div class="col-md-4">
                                <p> Ville :  <input class="form-control form-control-sm" type="text" name="ville" value='' required/><br/></p>
                            </div>
                        </div>
                        <hr>
                        <div class="rows">
                            <div class="col-md-4">
                                <p>Filière :
                                            <select class="form-control form-control-sm" name="diplome">
                                                @if ( isset($listDiplome))
                                                    @foreach ( $listDiplome as $value)
                                                        <option value="{{$value->id_annee}}">{{$value->diplome->niveau."  ".$value->libelle[0]."  ".$value->diplome->libelle}}</option>
                                                    @endforeach
                                                @endif
                                            </select> 
                                    </p> 
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-4">
                                <p> Dernier Diplome Obtenu à Université :
                                    <select class="form-control form-control-sm" name="diplomeObtenu">
                                        <option value="0">Aucun</option>
                                        @if ( isset($listDiplome))
                                            @foreach ( $listDiplome as $value)
                                                <option value="{{$value->id_annee}}">{{$value->diplome->niveau."  ".$value->libelle[0]."  ".$value->diplome->libelle}}</option>
                                            @endforeach
                                        @endif
                                    </select> 
                                </p> 
                                <p> Année d'obtention : <input class="form-control form-control-sm" type="number"  name="anneeObt" value='2017' /><br/></p>
                            </div>
                            <div class="col-md-2">

                            </div>
                            <div class="col-md-4">
                                <p>Filière :
                                    <select class="form-control form-control-sm" name="diplome">
                                        @if ( isset($listDiplome))
                                            @foreach ( $listDiplome as $value)
                                                <option value="{{$value->id_annee}}">{{$value->diplome->niveau."  ".$value->libelle[0]."  ".$value->diplome->libelle}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </p>
                                <p>Dernier Diplome Obtenu hors Univertisé :<input class="form-control form-control-sm" type="text" name="hors"  value='' /></p>
                                <p> Année d'obtention : <input class="form-control form-control-sm" type="number"  name="anneeObtHors" value='2017'/><br/></p>

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
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
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
                var elements = e.target.parentElement.querySelectorAll("td")
                var id_personne = elements.item(0).innerHTML
                var num = 0
                var filiereObtenu = ""
                var horsobtenu = ""
                var personnes = JSON.parse('<?= json_encode($listesEtudiant->all());  ?>')
                var diplome = JSON.parse('<?= json_encode($listDiplome);  ?>')
                for (var i = 0; i < personnes.length; i++) {
                    if ( id_personne == personnes[i]['id'])
                    {
                        num = i;
                    }
                }
                
                (personnes[num].est_diplome_hors_univ).forEach(function (value) {
                    horsobtenu += "</br>"+value.libelle+" ("+value.obtention+")";
                });
                (personnes[num].est_diplome).forEach(function (value) {
                    for ( var i=0; i< diplome.length; i++)
                    {
                        if ( value.id_annee == diplome[i].id_annee)
                        {
                            filiereObtenu += "</br>"+diplome[i].diplome.niveau+"  "+diplome[i].libelle[0]+"  "+diplome[i].diplome.libelle+" ("+value.obtention+")";
                        }
                    }
                });

                document.querySelector("#nom").innerHTML = elements.item(1).innerHTML +" "+elements.item(2).innerHTML
                document.querySelector("#email").innerHTML = "Email : "+ personnes[num].identity.email
                document.querySelector("#fil").innerHTML = " Filière : "+ elements.item(3).innerHTML
                document.querySelector("#filObtenu").innerHTML = " Diplômes obtenus : "+ filiereObtenu
                document.querySelector("#filHorsObtenu").innerHTML = "Diplome Obtenu hors campus: "+horsobtenu
                $( "#dialog" ).modal('show');
            });

            $( ".modifier" ).on( "click", function(e) {
                var elements = e.target.parentElement.parentElement.querySelectorAll("td")
                var id_personne = elements.item(0).innerHTML;
                var name_diplome = elements.item(3).innerHTML;
                var idIdentity = 0, idDiplome = 0;
                var personnes = JSON.parse('<?= json_encode($listesEtudiant->all());  ?>')
                var diplome = JSON.parse('<?= json_encode($listDiplome);  ?>')
                for (var i = 0; i < personnes.length; i++) {
                    if ( id_personne == personnes[i]['id'])
                    {
                        idIdentity = i;
                    }
                }
                diplome.forEach(function (value) {
                    var libelle = value.diplome.niveau+"  "+value.libelle[0]+"  "+value.diplome.libelle;
                    if(  name_diplome == libelle)
                    {
                        idDiplome = value.id_annee;
                    }
                });
                document.getElementById("id2").value = id_personne
                document.querySelector("#nom2").innerHTML = elements.item(1).innerHTML
                document.querySelector("#pre2").innerHTML = elements.item(2).innerHTML
                document.querySelector("#fil2").value = idDiplome
                document.querySelector("#email2").value = personnes[idIdentity].identity.email
                $( "#modif" ).modal( "show" );
            });

            $( ".add" ).on( "click", function(e) {
                $( "#ajout" ).modal( "show" );
            });

            $( ".del" ).on( "click", function(e) {
                var elements = e.target.parentElement.parentElement.querySelectorAll("td")
                document.getElementById("idS").value = elements.item(0).innerHTML
                document.querySelector("#nomS").innerHTML = elements.item(1).innerHTML +" "+elements.item(2).innerHTML;
                $( "#sup" ).modal( "show" );
            });
        } );

    </script>
@endsection
