@extends('layouts.app')

@section('content')

    <html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
        <link rel="stylesheet" href="theme.css" type="text/css">
    </head>
    <body>
        <div class="py-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>Liste des filières</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="py-0">
            <div class="container">
                <div class="row">
                    <div class="col-md-8" style="">
                        <h3 onclick="menuFiliere('science','scienceIcon')" style="cursor: pointer">
                            <i id="scienceIcon" class="fa fa-fw fa-minus"></i>&nbsp;
                            FACULTÉ DES SCIENCES ET TECHNIQUES (FST)</h3>
                    </div>
                    {{--<div class="col-md-4 offset-md-2">--}}
                        {{--<h3>--}}
                            {{--<div style="text-align: center;">--}}
                                {{--<span style="color: inherit; font-size: 1.75rem;">--}}
                                    {{--<font face="FontAwesome">--}}
                                        {{--<i></i>--}}
                                    {{--</font>--}}
                                {{--</span>--}}
                            {{--</div>--}}
                        {{--</h3>--}}
                    {{--</div>--}}
                </div>
            </div>
        </div>
        <div name="science" class="py-0">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 mx-4">
                        <br>
                        <p class="mx-3 lead"><b onclick="menuFiliere('scienceLi','scienceIconLi')" style="cursor: pointer"><i id="scienceIconLi" class="fa fa-fw fa-minus"></i> Licence</b><b><i class="mx-5 add" style="cursor: pointer">Ajouter une filière</i></b>
                            <br>
                            <div name="scienceLi">
                                <p class="mx-5">Licence 3 Sciences pour l'ingénieur parcours informatique</p>
                                <p class="mx-5">Licence 3 Sciences pour l'ingénieur parcours maths-physique</p>
                                <p class="mx-5">Licence 3 Sciences pour l'ingénieur parcours physique-chimie</p>
                            </div>
                        </p>
                    <p class="mx-3 lead"><b><i class="fa fa-fw fa-plus"></i>Master</b><b><i class="mx-5 add" style="cursor: pointer">Ajouter une filière</i></b>
                        </p>
                    <p class="mx-3 lead"><b><i class="fa fa-fw fa-plus"></i>Autres</b><b><i class="mx-5 add" style="cursor: pointer">Ajouter une filière</i></b>
                        </p>
                    </div>
                    <div name="scienceLi" class="col-md-1 mx-0">
                        <br><br>
                        <p></p>
                        <span class="modifier"><i class="fa fa-fw fa-pencil-square fa-2x text-dark my-1" title="Modifier" style="cursor: pointer"></i></span>
                        <span class="modifier"><i class="fa fa-fw fa-pencil-square fa-2x text-dark my-1" title="Modifier" style="cursor: pointer"></i></span>
                        <span class="modifier"><i class="fa fa-fw fa-pencil-square fa-2x text-dark my-1" title="Modifier" style="cursor: pointer"></i></span>
                        <p class="my-0"><br></p>
                        <p class="my-0"><br></p>
                        <p class="my-0"><br></p>
                    </div>
                    <div name="scienceLi" class="col-md-1 m-0">
                        <br><br>
                        <p></p>
                        <span class="informations"><i class="fa fa-fw fa-2x text-dark fa-info-circle my-1" title="Details" style="cursor: pointer"></i></span>
                        <span class="informations"><i class="fa fa-fw fa-2x text-dark fa-info-circle my-1" title="Details" style="cursor: pointer"></i></span>
                        <span class="informations"><i class="fa fa-fw fa-2x text-dark fa-info-circle my-1" title="Details" style="cursor: pointer"></i></span>
                        <p class="my-0"><br></p>
                        <p class="my-0"><br></p>
                        <p class="my-0"><br></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="py-0">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="" style="">
                            <i class="fa fa-fw fa-plus"></i>
                            UFR DROIT, SCIENCES SOCIALES, ÉCONOMIQUES ET DE GESTION
                        </h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="py-0">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="" style="">
                            <i class="fa fa-fw fa-plus"></i>
                            INSTITUT UNIVERSITAIRE DE TECHNOLOGIE (IUT)
                        </h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="py-0">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="" style="">
                            <i class="fa fa-fw fa-plus"></i>
                            FACULTÉ DES LETTRES, LANGUES, ARTS, SCIENCES HUMAINES ET SOCIALES
                        </h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="py-0">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="" style="">
                            <i class="fa fa-fw fa-plus"></i>
                            ÉCOLE SUPÉRIEURE DU PROFESSORAT ET DE L'ÉDUCATION (ESPE)
                        </h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="py-0">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="" style="">
                            <i class="fa fa-fw fa-plus"></i>
                            ÉCOLE D'INGÉNIEURS PAOLI TECH
                        </h3>
                    </div>
                </div>
            </div>
        </div>

        <div id="edit" title="Modification d'une filière " class="modal fade" >
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" >
                            <span>Licence</span>
                            <span>3ème</span>
                            <span>Sciences pour l'ingénieur</span>
                        </h5>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" action="" accept-charset="UTF-8">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <input id="id2" type="hidden" name="id" value="" />
                                    <p> Libelle: <input type="text"  name="lib" id="lib2" value='' required/><br /></p>
                                </div>
                                <div class="col-md-2">

                                </div>
                                <div class="col-md-4">

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

        <div id="details" title="Informations sur la filière" class="modal fade" >
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" >
                            <span>Licence</span>
                            <span>3ème</span>
                            <span>Sciences pour l'ingénieur</span>
                        </h5>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" action="" accept-charset="UTF-8">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <p> Libelle :  Licence 3ème Sciences pour l'ingénieur<br /></p>
                                </div>
                                <div class="col-md-2">

                                </div>
                                <div class="col-md-4">

                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary"> Ok</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div id="ajout" title="Ajout d'une filière " class="modal fade" >
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" >
                            <span>Ajouter une filière</span>
                        </h5>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" action="" accept-charset="UTF-8">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <input id="id2" type="hidden" name="id" value="" />
                                    <p> Libelle: <input type="text"  name="lib" id="lib2" value='' required/><br /></p>
                                </div>
                                <div class="col-md-2">

                                </div>
                                <div class="col-md-4">

                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary">Ajouter</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    </body>
    </html>

@endsection

@section('script')

    <script>
        function menuFiliere(name,id2)
        {
                var baliseDiv = document.getElementsByName(name);
                var baliseI = document.getElementById(id2);

                for(var i=0;i<baliseDiv.length;i++)
                {
                    if (baliseDiv.item(i).style.display === 'none')
                    {
                        baliseDiv.item(i).style.display = 'block';
                        baliseI.className = 'fa fa-fw fa-minus';
                    }
                    else
                    {
                        baliseDiv.item(i).style.display = 'none';
                        baliseI.className = 'fa fa-fw fa-plus';
                    }
                }

        }
        $( ".modifier" ).on( "click", function()
        {
            $( "#edit" ).modal( "show" );
        });

        $(".informations").on("click",function ()
        {
            $("#details").modal("show");
        });

        $(".add").on("click",function ()
        {
            $("#ajout").modal("show");
        });
    </script>

@endsection