
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
                        <td hidden>{{$enseignant->id}}</td>
                        <td  class="opener" data-target="#affichage">{{$enseignant->identity->nom}}</td>
                        <td  class="opener" data-target="#affichage">{{$enseignant->identity->prenom}}</td>
                        <td  class="opener" data-target="#affichage">{{$enseignant->departement->libelle}}</td>
                        @if(Auth::user()->isAdmin())
                            <td><i id="modifier"class="fa fa-edit fa-2x"></i></td>
                            <td><i id="del" class="fa fa-trash fa-2x"  style="color:red"></i></td>
                        @endif
                    </tr>

                @endforeach
            @endif
            </tbody>
        </table>
    {{$listesEnseignant->render()}} <!-- Nombres de page et redirection de la pagination -->
    </div>

    <!-- POPUP Affichage -->
    <div id="affichage" title="Profil de l' Enseignant" class="modal fade" >
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="nom">Détails enseignant</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <p id="email"> Email: Aucun </p>

                            <p id="respon">Responsabilités : Aucun</p>

                        </div>
                        <div class="col">
                            <p id="bureau">Bureau : Aucun</p>
                        </div>
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
                                    <p> Nom: <input type="text" class="form-control form-control-sm" name="nom" value='' required/><br/></p>
                                    <p> Date de Naissance :  <input type="date" class="form-control form-control-sm" name="naissance" value='' required/><br></p>
                                </div>
                                <div class="col-md-2">

                                </div>
                                <div class="col-md-4">
                                    <p> Prénom: <input type="text" class="form-control form-control-sm" name="prenom" value='' required/><br/><br/><br></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <p> Email de Secours: <input type="email" class="form-control form-control-sm"  name="emailSos" value='' required/><br/></p>
                                    <p> Adresse : <input type="text" class="form-control form-control-sm" name="adresse" value='' required/><br/></p>
                                </div>
                                <div class="col-md-2">

                                </div>
                                <div class="col-md-4">
                                    <p> Numéro de télephone : <input type="text" class="form-control form-control-sm" name="tel" placeholder="04 23 45 67 89" value='' required pattern="^0[1-68]([-. ]?[0-9]{2}){4}$"/><br/></p>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <p> Code Postal :  <input  class="form-control form-control-sm" name="codePostal" type="number" value='20000'required/><br/></p>
                                </div>
                                <div class="col-md-2">

                                </div>
                                <div class="col-md-4">
                                    <p> Ville :  <input type="text" name="ville" class="form-control form-control-sm" value='' required/><br/></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-4">
                                    <p> Fonction :
                                        <select class="form-control form-control-sm" name="fonction">
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
                                    <select  id="slct" class="form-control form-control-sm Responsabilie" name="Responsabilie[]" onchange="getChef(0)">
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
                                        <select class="form-control form-control-sm" class="departement" name="departement">
                                            @if ( isset($listeDepartement))
                                                @foreach ( $listeDepartement as $departement)
                                                    <option value="{{$departement->id_departement}}">{{$departement->libelle}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        <span type="hidden">
                                            <select class="form-control form-control-sm" id="hiddenDiplome">
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
                        <h6> Êtes-vous sûr de supprimer <span id="nomS" name="nom"> cet enseignant </span> ?</h6>
                        <br>
                        <div class="row">
                            <div class="col">
                                <form method="post" action="{{ url('annuaire/professeurs/deleteProf') }}">
                                    {{ csrf_field() }}
                                    <input id="idS" type="hidden" name="id" value=""/>
                                    <button class="btn btn-danger">Confirmer</button>
                                </form>
                            </div>
                            <div class="col">
                                <button class="btn btn-secondary">Annuler</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- POPUP DE MODIFICATON -->
    <div id="modif"  class="modal fade">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="nom2">Profil de l' Enseignant</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="{!! url('annuaire/professeurs/updateProf') !!}" accept-charset="UTF-8">
                    <div class="modal-body">
                        <div class="container">

                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-5">
                                    <input id="id2" type="hidden" name="id" value=""/>
                                    <p> Email: <input class="form-control form-control-sm" type="email"  name="email" id="email2" value='douvle kek' required/><br/></p>
                                    <p> Telephone: <input class="form-control form-control-sm" type="text"  name="tel" id="tel2" placeholder="04 23 45 67 89" value='' required pattern="^0[1-68]([-. ]?[0-9]{2}){4}$"/><br /></p>
                                    <p> Adresse: <input class="form-control form-control-sm" type="text"  name="adresse" id="adresse2" value='' required/><br /></p>
                                </div>
                                <div class="col-md-2">

                                </div>
                                <div class="col-md-5">
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

@endsection

@section('script')
    <script>
        var nbSelect= 0;
        function getChef(nbS) {
            var c = document.getElementsByClassName("form-control form-control-sm Responsabilie");
            console.log(c);
            var d = c[nbS].options;
            var q = "slct"+nbS;
            if(d[c[nbS].selectedIndex].text == "Responsable de Filière"){
                var line = "Classe: <select class='form-control form-control-sm' class='classes' name='classes[]'>";
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
                var line = "<div id='slct"+nbSelect+"'> <select class='form-control form-control-sm Responsabilie' name='Responsabilie[]' onchange='getChef("+nbSelect+")'>";
                $("#slct option").each(function()
                {
                    line += "<option value='"+$(this).val()+"'>"+$(this).text()+"</option>";
                });
                line += "</select></span>";
                $(newDiv).append(line);
            });

            $( ".opener" ).on( "click", function(e) {
                var elements = e.target.parentElement.querySelectorAll("td")
                var id_personne = elements.item(0).innerHTML
                var num = 0
                var responsabilité = "Ses Responsabilités :"
                var personnes = JSON.parse('<?= json_encode($listesEnseignant->all());  ?>')
                var respo = JSON.parse('<?= json_encode($listeResponsabilite);  ?>')
                for (var i = 0; i < personnes.length; i++) {
                    if ( id_personne == personnes[i]['id'])
                    {
                        num = i;
                    }
                }
                (personnes[num].est__responsable).forEach(function (value) {
                    for ( var i=0; i< respo.length; i++)
                    {

                        if ( value.id_reponsabilite == respo[i].id_reponsabilite)
                        {
                            responsabilité += "</br> -"+respo[i].libellle;
                        }
                    }
                });
                document.querySelector("#nom").innerHTML = elements.item(1).innerHTML +" "+elements.item(2).innerHTML
                document.querySelector("#email").innerHTML = "Email : "+ personnes[num].identity.email
                document.querySelector("#bureau").innerHTML ="Son Bureau </br> Batiment : " + personnes[num].batiment +"</br> Etage : " + personnes[num].etage;
                document.querySelector("#respon").innerHTML = responsabilité;
                $( "#affichage" ).modal( "show" );
            });
            $( ".add" ).on( "click", function(e) {
                $( "#ajout" ).modal( "show" );
            });

            $( "i#del" ).on( "click", function(e) {
                var elements = e.target.parentElement.parentElement.querySelectorAll("td")
                document.getElementById("idS").value = elements.item(0).innerHTML
                document.querySelector("#nomS").innerHTML = elements.item(1).innerHTML +" "+elements.item(2).innerHTML;
                $( "#sup" ).modal( "show" );
            });
            $( "i#modifier" ).on( "click", function(e) {
                var elements = e.target.parentElement.parentElement.querySelectorAll("td");
                var id_personne = elements.item(0).innerHTML;
                var num = 0;
                var personnes = JSON.parse('<?= json_encode($listesEnseignant->all());  ?>');
                for (var i = 0; i < personnes.length; i++) {
                    if ( id_personne == personnes[i]['id'])
                    {
                        num = i;
                    }
                }

                console.log(personnes[num]);
                document.querySelector("#id2").value = personnes[num].identity.id;
                document.querySelector("#nom2").innerHTML = elements.item(1).innerHTML +" "+elements.item(2).innerHTML;
                document.querySelector("#email2").value = personnes[num].identity.email;
                document.querySelector("#tel2").value = personnes[num].identity.tel;
                document.querySelector("#adresse2").value = personnes[num].identity.adresse;
                document.querySelector("#batiment2").value = personnes[num].batiment;
                document.querySelector("#etage2").value = personnes[num].etage;
                $( "#modif" ).modal( "show" );
            });


        } );

    </script>
@endsection