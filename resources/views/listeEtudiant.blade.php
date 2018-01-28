<!doctype html>

<html lang="fr">

<head>

    <meta charset="UTF-8"> 
    
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/myStyle.css') }}" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset('css/jquery-ui.css') }}">
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/jquery2.js') }}"></script>

   

    <title>Liste d'Etudiants</title> 

    <script>
        $( function() {
            //AFFICHAGE POPUP
            $( "#dialog" ).dialog({
                width: 750,
                autoOpen: false,

            });
            $( ".opener" ).on( "click", function(e) {
                var elements = e.target.parentElement.querySelectorAll("th")
                document.querySelector("#nom").innerHTML = elements.item(1).innerHTML +" "+elements.item(2).innerHTML
                document.querySelector("#fil").innerHTML ="Filière: "+ elements.item(3).innerHTML
                $( "#dialog" ).dialog( "open" );
            });

            //MODIFICATION POPUP
            $( "#modif" ).dialog({
                width: 750,
                autoOpen: false,

            });
            $( ".modifier" ).on( "click", function(e) {
                var elements = e.target.parentElement.parentElement.querySelectorAll("th")
                document.getElementById("id2").value = elements.item(0).innerHTML
                document.querySelector("#nom2").innerHTML = elements.item(1).innerHTML
                document.querySelector("#pre2").innerHTML = elements.item(2).innerHTML
                document.getElementById("fil2").value = elements.item(3).innerHTML;
                $( "#modif" ).dialog( "open" );
            });

            //AJOUT POPUP
            $( "#ajout" ).dialog({
                width: 550,
                autoOpen: false,

            });
            $( ".add" ).on( "click", function(e) {
                /*var elements = e.target.parentElement.parentElement.querySelectorAll("th")
                document.querySelector("#nom3").innerHTML = elements.item(1).innerHTML +" "+elements.item(2).innerHTML
                document.getElementById("fil2").value = elements.item(3).innerHTML;*/
                $( "#ajout" ).dialog( "open" );
            });

            //DELETE POPUP
            $( "#sup" ).dialog({
                width: 550,
                autoOpen: false,

            });
            $( ".del" ).on( "click", function(e) {
                $( "#sup" ).dialog( "open" );
            });
        } );

    </script>
</head>

<body>
@include('base/header')
    <div id="dimGest">
        <div class="row">
                <div class="col">
                    <?php 
                        if ( $user== 'admin')
                        {
                    ?>
                        <button class="add" >Ajouter d'un étudiant : <img src="{{ asset('img/png/plus-4x.png') }}"/></button>
                    <?php
                        }     
                    ?>
                </div>
                
        </div>
        </br>
        <table class="table table-bordered ">
            <thead>
            <tr>
                <th></th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Filière</th>
                <?php 
                if ( $user== 'admin'||$user == 'chef')
                    {
                    ?>
                <th>Modifier</th>
                <th>Supprimer</th>
                <?php
                    }
                    ?>
            </tr>
            </thead>
            <tbody>
           
            <?php foreach ( $etudiants as $etudiant): 
                
                if (  $recherche == null ||  stristr( $etudiant->prenom ,$recherche  ) ||   stristr( $etudiant->nom ,$recherche ) )
                {  
                    
            ?>
                <tr>
                    <th  >{{$etudiant->id}}</th>
                    <th  class="opener">{{$etudiant->nom}}</th>
                    <th  class="opener">{{$etudiant->prenom}}</th>
                    <th  class="opener">{{$etudiant->filiere}}</th>
                <?php 
                    if ( $user == 'admin'||$user == 'chef')
                    {
                    ?>
                    
                    <th ><button class="modifier"><img src="{{ asset('img/png/brush-4x.png') }}"/></button></th> 
                    <th class="del">
                        <a >
                            <img src="{{ asset('img/png/trash-4x.png') }}"/>
                        </a>
                    </th>
                    <?php
                    }
                }
                    ?>
                </tr> 
            <?php endforeach;?>
            </tbody>
        </table>
    </div>

        <!-- POPUP D'AFFICHAGE -->
        <div id="dialog" title="Profil de l' Etudiant">
            <div class="container">
                <h1 id="nom">Etudiant</h1>
                    <div class="row">
                        <div class="col">
                            <p id="email"> Email: </p>
                        </div>
                        <div class="col">
                            <p id="fil"> Filière: </p>
                        </div>
                    </div>
            </div>
        </div>
 <!-- POPUP DE MODIFICATON -->
 <div id="modif" title="Modification de l' Etudiant">
     <div class="container">
        <form method="post" action="{!! url('updateEtudiant') !!}" accept-charset="UTF-8">
            {{ csrf_field() }}
            <h1><span id="nom2" name="nom"> P </span> <span id="pre2" name="prenom">P</span></h1>
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
                    <button class="btn btn-primary"> Modifier</button>
                </div>
            </div>
        </form>
     </div>
</div>

 <!-- POPUP D'AJOUT -->
 <div id="ajout" title="Ajouter de l' Etudiant">
     <div class="container">
        <div class="row">
            <div class="col">
                <form method="post" action="{!! url('saveEtudiant') !!}" accept-charset="UTF-8">
                    {{ csrf_field() }}
                    <p>Nom: <input type="text" id="nom3" name="nom" value=''/><br/></p>
                    <p> Prénom: <input type="text" id="pre3" name="prenom" value=''/><br/></p>
                    <p> Filière: <input type="text" id="fil3" name="filiere" value=''/><br/></p>
                    <p> Email: <br /></p>
                    <button class="btn btn-primary">Ajouter</button>
                </form>  
            </div>
        </div>
     </div>
</div>

 <!-- POPUP DE SUPRESSION -->
 <div id="sup" title="Suppression de l' Etudiant">
     <div class="container">
        <h4> Êtes-vous sûr de supprimer cet étudiant ?</h4> 
        <div class="row">
            <div class="col">
                <form method="get" action="{{ url('deleteEtudiant/'.$etudiant->id) }}">
                    <button class="btn btn-danger">Confirmer</button>
                </form>     
            </div>
            <div class="col">
                <button>Annuler</button>
            </div>
        </div>
    </div>
</body>

</html>