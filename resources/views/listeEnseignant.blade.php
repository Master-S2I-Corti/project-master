
@extends('layouts.app')



@section('content')

    <div id="dimGest" class="w-75 m-auto py-5">
        <div class="d-flex justify-content-between mb-5">
            <h2>Liste des enseignants</h2>
            @if(Auth::user()->isAdmin())
                <button class="add btn btn-primary" >Ajouter un enseignant <i class="ml-2 d-inline fa fa-plus fa-lg"></i></button>
            @endif
        </div>

        @if(session()->has("ok"))
                <div class="alert alert-success alert-dismissible">
                        {!! session('ok') !!}
                </div>
            @elseif (session()->has("error"))
                <div class="alert alert-danger alert-dismissible">
                        {!! session('error') !!}
                </div>
            @endif

        <div class="card">
                <h3>Recherche d'un enseignant</h3>
                <form method="post" action="{!! url('annuaire/professeurs/search') !!}" accept-charset="UTF-8">
                    <div class="modal-body">
                            <div class="row">
                            {{ csrf_field() }}
                                <div class="col-md">
                                    <p> Nom : <input class="form-control form-control-sm" type="text" name="nom" value='' /><br/></p>
                                    </div>
                                <div class="col-md">
                                    <p> Prénom : <input class="form-control form-control-sm" type="text" name="prenom" value='' /><br/></p>
                                </div>
                                <div class="col-md">
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
                                <th style="color:white">{{$enseignant->id}}</th>
                                <th  class="opener" data-target="#affichage">{{$enseignant->nom}}</th>
                                <th  class="opener" data-target="#affichage">{{$enseignant->prenom}}</th>
                                <th  class="opener" data-target="#affichage">Informatique</th>
                                @if(Auth::user()->isAdmin())
                                <th class="modifier" ><i class="fa fa-edit fa-2x"></i></th>
                                <th class="del"><i class="fa fa-trash fa-2x" style="color:red"></i></th>
                                @endif
                        </tr>
                
                @endforeach
            @endif
            </tbody>
        </table>
        {{$listesEnseignant->render()}} <!-- Nombres de page et redirection de la pagination -->
    </div>

    <!-- POPUP Affichage -->
    <div id="affichage" class="modal fade">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" >Profil de l'enseignant</h5>
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
                                    <p id="email"> Email: <br/></p>
                                    <!--<p id="dep"> Département: </p> -->
                                    
                                </div>
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
                            <form method="post" action="{!! url('annuaire/professeurs/updateProf') !!}" accept-charset="UTF-8">
                                {{ csrf_field() }}
                                <h1><span id="nom2" name="nom"> P </span> </h1>
                                <div class="row">
                                    <div class="col">
                                    <input id="id2" type="hidden" name="id" value=""/>
                                    <p> Email: <input class="form-control form-control-sm" type="email"  name="email" id="email2" value='douvle kek' required/><br/></p>
                                    <p> Telephone: <input class="form-control form-control-sm" type="text"  name="tel" id="tel2" value='' required/><br /></p>
                                    <p> Adresse: <input class="form-control form-control-sm" type="text"  name="adresse" id="adresse2" value='' required/><br /></p>
                                    <button class="btn btn-primary"> Modifier</button>
                                    </div>
                                    <div class="col">
                                    <p> Departement: <select class="form-control form-control-sm" name="departement">
                                        @if ( isset($listeDepartement))
                                            @foreach ( $listeDepartement as $departement)
                                                    <option value="{{$departement->id_departement}}">{{$departement->libelle}}</option>
                                            @endforeach
                                        @endif
                                        </select> <br /></p>
                                    <p> Batiment: <input class="form-control form-control-sm" type="text"  name="batiment" id="batiment2" value='' required/><br /></p>
                                    <p> Etage: <input class="form-control form-control-sm" type="text"  name="etage" id="etage2" value='' required/><br /></p>
                                </div>
                                <div class="row">
                                    <div class="col">
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
                                    <p> Responsabilité :
                                    <span id='resp'>
                                    <span id='slct0'>
                                    <select id="slct" class="Responsabilie" name="Responsabilie[]" onchange="getChef(0)">
                                            <option value="0">Aucune</option>
                                        @if ( isset($listeResponsabilite))
                                            @foreach ( $listeResponsabilite as $respo)
                                                    <option value="{{$respo->id_reponsabilite}}">{{$respo->libellle}}</option>
                                            @endforeach
                                        @endif
                                        </select>
                                        </span>
                                        </span>
                                        <button id="btnadd" class="add btn btn-primary" type="button">+</button>
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
                                            <span type="hidden">
                                            <select id="hiddenDiplome">
                                            @if ( isset($listeDiplome))
                                                @foreach ( $listeDiplome as $dip)
                                                        <option value="{{$dip->id_diplome}}">{{$dip->libelle}}</option>
                                                @endforeach
                                            @endif
                                            </select> 
                                            </span>
                                        </p> 
                                        
                                        
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
    var nbSelect= 0;
    function getChef(nbS) {
        var c = document.getElementsByClassName("Responsabilie");
        var d = c[nbS].options;
        var q = "slct"+nbS;
        //console.log(d[c[nbS].selectedIndex].text);
        if(d[c[nbS].selectedIndex].text == "Responsable de Filière"){
            var line = "Classe: <select class='classes' name='classes[]'>";                   
                     $("#hiddenDiplome option").each(function()
                    {
                        line += "<option value='"+$(this).val()+"'>"+$(this).text()+"</option>";
                    });
                    line += "</select>";
           $("#slct"+nbS).append(line);
        }
        }

        $( function() {
            $( "#btnadd" ).on( "click", function(e) {
                    nbSelect = nbSelect + 1;
                    var newDiv =  document.getElementById("resp");
                    var line = "<div id='slct"+nbSelect+"'> <select class='Responsabilie' name='Responsabilie[]' onchange='getChef("+nbSelect+")'>";                   
                     $("#slct option").each(function()
                    {
                        line += "<option value='"+$(this).val()+"'>"+$(this).text()+"</option>";
                    });
                    line += "</select></span>";
                    $(newDiv).append(line);
            });

            $( ".opener" ).on( "click", function(e) {
                var elements = e.target.parentElement.querySelectorAll("th")
                var id_personne = elements.item(0).innerHTML
                var num = 0
                var personnes = JSON.parse('<?= json_encode($listesEnseignant->all());  ?>')
                for (var i = 0; i < personnes.length; i++) {
                    if ( id_personne == personnes[i]['id'])
                    {
                        num = i;
                    }
                }
                document.querySelector("#nom").innerHTML = elements.item(1).innerHTML +" "+elements.item(2).innerHTML
                document.querySelector("#email").innerHTML ="Email : "+ personnes[num]['email']
                $( "#affichage" ).modal( "show" );
            });

            $( ".modifier" ).on( "click", function(e) {
                var elements = e.target.parentElement.parentElement.querySelectorAll("th");
                var id_personne = elements.item(0).innerHTML;
                var num = 0;
                var numP = 0;
                var profs = JSON.parse('<?= json_encode($listeP->all());  ?>');
                var personnes = JSON.parse('<?= json_encode($listesEnseignant->all());  ?>');
                for (var i = 0; i < personnes.length; i++) {
                    if ( id_personne == personnes[i]['id'])
                    {
                        num = i;
                        numP = personnes[i]['code_professeur'];
                    }
                }

                for (var i = 0; i < profs.length; i++) {
                    if ( numP == profs[i]['code_professeur'])
                    {
                        numP = i;
                    }
                }

                console.log(personnes[num]);
                document.querySelector("#id2").value = personnes[num]['id'];
                document.querySelector("#nom2").innerHTML = elements.item(1).innerHTML +" "+elements.item(2).innerHTML;
                document.querySelector("#email2").value = personnes[num]['email'];
                document.querySelector("#tel2").value = personnes[num]['tel'];
                document.querySelector("#adresse2").value = personnes[num]['adresse'];
                document.querySelector("#batiment2").value = profs[numP]['batiment'];
                document.querySelector("#etage2").value = profs[numP]['etage'];
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