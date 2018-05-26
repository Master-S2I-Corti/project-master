@extends('layouts.app')

@section('content')


        <div class="py-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>Liste des filières</h1>
                    </div>
                </div>
            </div>
        </div>

        @if (isset($ufr))
            @foreach ($ufr as $u)
                <div class="py-0">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8">
                                <h3 onclick="menuFiliere('science','scienceIcon')" style="cursor: pointer"><i id="scienceIcon" class="fa fa-fw fa-minus"></i>&nbsp;UFR {{strtoupper($u->libelle)}} (FST)</h3>
                            </div>
                        </div>
                    </div>
                    <div name="science" class="container">
                        <div class="row">
                            <div class="col-md-5 mx-4">
                                <br>
                                <p class="mx-3 lead"><b onclick="menuFiliere('scienceLi','scienceIconLi')" style="cursor: pointer"><i id="scienceIconLi" class="fa fa-fw fa-plus"></i> Licence</b><b><i class="mx-5 addLi" style="cursor: pointer">Ajouter une filière</i></b></p>
                                <br>
                                <div style="display: none" name="scienceLi">
                                    @foreach($annees as $a)
                                        @foreach($filieres as $f)
                                            @if($a->id_diplome==$f->id_diplome && $f->niveau === 'LICENCE')
                                                <p class="mx-5">{{$f->niveau .' ' . $a->libelle . ' ' . $f->libelle}}</p>
                                            @endif
                                        @endforeach
                                    @endforeach
                                </div>
                            </div>
                            <div style="display: none" name="scienceLi" class="col-md-2 mx-0 my-4">
                                <br><br>
                                <p></p>
                                @foreach($annees as $a)
                                    @foreach($filieres as $f)
                                        @if($a->id_diplome==$f->id_diplome && $f->niveau === 'LICENCE')
                                            <span id="modif{{$a->id_annee}}" class="modifier"><i class="fa fa-fw fa-edit fa-2x text-dark my-1" title="Modifier" style="cursor: pointer"></i></span>
                                            <span class="del"><i class="fa fa-fw fa-times-circle fa-2x text-dark my-1" title="Supprimer" style="cursor: pointer"></i></span>
                                            <span id="info{{$a->id_annee}}" class="informations"><i class="fa fa-fw fa-2x text-dark fa-info-circle my-1" title="Details" style="cursor: pointer"></i></span>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div name="science" class="container">
                        <div class="row">
                            <div class="col-md-5 mx-4">
                                <br>
                                <p class="mx-3 lead"><b onclick="menuFiliere('scienceMa','scienceIconMa')" style="cursor: pointer"><i id="scienceIconMa" class="fa fa-fw fa-plus"></i> Master</b><b><i class="mx-5 addMa" style="cursor: pointer">Ajouter une filière</i></b></p>
                                <br>
                                <div style="display: none" name="scienceMa">
                                    @foreach($annees as $a)
                                        @foreach($filieres as $f)
                                            @if($a->id_diplome==$f->id_diplome && $f->niveau === 'MASTER')
                                                <p class="mx-5">{{$f->niveau .' ' . $a->libelle . ' ' . $f->libelle}}</p>
                                            @endif
                                        @endforeach
                                    @endforeach
                                </div>
                            </div>
                            <div style="display: none" name="scienceMa" class="col-md-2 my-4">
                                <br><br>
                                <p></p>
                                @foreach($annees as $a)
                                    @foreach($filieres as $f)
                                        @if($a->id_diplome==$f->id_diplome && $f->niveau === 'MASTER')
                                            <span id="modif{{$a->id_annee}}" class="modifier"><i class="fa fa-fw fa-edit fa-2x text-dark my-1" title="Modifier" style="cursor: pointer"></i></span>
                                            <span class="del"><i class="fa fa-fw fa-times-circle fa-2x text-dark my-1" title="Supprimer" style="cursor: pointer"></i></span>
                                            <span id="info{{$a->id_annee}}" class="informations"><i class="fa fa-fw fa-2x text-dark fa-info-circle my-1" title="Details" style="cursor: pointer"></i></span>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif

        {{--template de la popin d'édition d'une filière--}}
        <div id="edit" title="Modification d'une filière " class="modal fade" >
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" >
                                <span id="niveau"></span>
                                <span id="libelleA"></span>
                                <span id="libelleD"></span>

                        </h5>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <input id="id2" type="hidden" name="id" value="" />
                                    <p> Ancien libelle : <span id="old"></span></p>
                                    <p> Nouveau libelle : <input type="text" id="new" value='' required/><br /></p>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary"> Modifier</button>
                            <button class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        </div>
                </div>
            </div>
        </div>

        {{--template de la popin d'informations sur la filière--}}
        <div id="details" title="Informations sur la filière" class="modal fade" >
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" >
                            <span>Informations sur la filière</span>
                        </h5>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" action="" accept-charset="UTF-8">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <p> Niveau du diplôme :  <span id="niveauInfo"></span></p>
                                    <p> Annee :  <span id="libelleAInfo"></span></p>
                                    <p> Libelle de la filière :  <span id="libelleDInfo"></span></p>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary" data-dismiss="modal">Fermer</button>
                            <a class="btn btn-primary" href="{{ URL::to('/gestion/edt') }}">Accéder à l'emploi du temps</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{--template de la popin d'ajout d'une filière--}}
        <div id="ajoutLi" title="Ajout d'une filière " class="modal fade" >
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
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <input id="id2" type="hidden" name="id" value="" />
                                    <p> Niveau :
                                        <select id="niveauSelect">
                                            <option value="licence" selected>Licence</option>
                                            <option value="master">Master</option>
                                        </select>
                                    </p>
                                    <p> Libelle : <input type="text"  name="lib" id="lib2" value='' required/><br /></p>
                                    <p> Département :
                                        <select id="dptSelect">
                                            <option value="all" selected>Choisissez un département..</option>
                                            <option value="1">Informatique</option>
                                        </select>
                                    </p>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary">Ajouter</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        </div>
                </div>
            </div>
        </div>
        <div id="ajoutMa" title="Ajout d'une filière " class="modal fade" >
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
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <input id="id2" type="hidden" name="id" value="" />
                                    <p> Niveau :
                                        <select id="niveauSelect">
                                            <option value="licence">Licence</option>
                                            <option value="master" selected>Master</option>
                                        </select>
                                    </p>
                                    <p> Libelle : <input type="text"  name="lib" id="lib2" value='' required/><br /></p>
                                    <p> Département :
                                        <select id="dptSelect">
                                            <option value="all" selected>Choisissez un département..</option>
                                            <option value="1">Informatique</option>
                                        </select>
                                    </p>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary">Ajouter</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        </div>
                </div>
            </div>
        </div>

        {{--template de la popin de suppression d'une filière--}}
        <div id="supp" title="Supprimer la filière" class="modal fade">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Suppression de la filière</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h4> Êtes-vous sûr de vouloir supprimer la filière ?</h4>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-danger">Confirmer</button>
                        <button class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    </div>
                </div>
            </div>
        </div>

@endsection

@section('script')

    <script>
        //affiche ou cache les filières de la faculté demandée
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

        //popin d'édition d'une filière
        $( ".modifier" ).on( "click", function()
        {
            var i;
            var filieres = JSON.parse('<?= json_encode($filieres->all());  ?>')
            var annees = JSON.parse('<?= json_encode($annees->all());  ?>')
            for(i=0;i<=annees.length;i++)
            {
                if($(this).attr('id')=="modif"+i)
                {
                    document.getElementById("libelleA").innerHTML = annees[i-1].libelle;
                    if(i<=1)
                    {
                        console.log(filieres[0],filieres[1])
                        document.getElementById("niveau").innerHTML = filieres[0].niveau;
                        document.getElementById("libelleD").innerHTML = filieres[0].libelle;
                        document.getElementById("old").innerHTML = filieres[0].libelle;
                        document.getElementById("new").value = filieres[0].libelle;
                    }
                    else
                    {
                        document.getElementById("niveau").innerHTML = filieres[1].niveau;
                        document.getElementById("libelleD").innerHTML = filieres[1].libelle;
                        document.getElementById("old").innerHTML = filieres[1].libelle;
                        document.getElementById("new").value = filieres[1].libelle;
                    }
                }

            }
            $( "#edit" ).modal( "show" );
        });

        //popin relatant les informations sur la filière
        $(".informations").on("click",function ()
        {
            // var i;
            var filieres = JSON.parse('<?= json_encode($filieres->all());  ?>')
            var annees = JSON.parse('<?= json_encode($annees->all());  ?>')
            for(var i=0;i<=annees.length;i++)
            {
                if($(this).attr('id')=="info"+i)
                {
                    document.getElementById("libelleAInfo").innerHTML = annees[i-1].libelle;
                    if(i<=1)
                    {
                        console.log(filieres[0],filieres[1])
                        document.getElementById("niveauInfo").innerHTML = filieres[0].niveau;
                        document.getElementById("libelleDInfo").innerHTML = filieres[0].libelle;
                    }
                    else
                    {
                        document.getElementById("niveauInfo").innerHTML = filieres[1].niveau;
                        document.getElementById("libelleDInfo").innerHTML = filieres[1].libelle;
                    }
                }

            }
            $("#details").modal("show");
        });

        //popin d'ajout d'une filière
        $(".addLi").on("click",function ()
        {
            $("#ajoutLi").modal("show");
        });
        $(".addMa").on("click",function ()
        {
            $("#ajoutMa").modal("show");
        });

        $( ".del" ).on( "click", function()
        {
            $( "#supp" ).modal( "show" );
        });
    </script>

@endsection