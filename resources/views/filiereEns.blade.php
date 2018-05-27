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
                            <p class="mx-3 lead"><b onclick="menuFiliere('scienceLi','scienceIconLi')" style="cursor: pointer"><i id="scienceIconLi" class="fa fa-fw fa-plus"></i> Licence</b></p>
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
                        <div style="display: none" name="scienceLi" class="col-md-4 mx-0 my-4">
                            <br><br>
                            <p></p>
                            @foreach($annees as $a)
                                @foreach($filieres as $f)
                                    @if($a->id_diplome==$f->id_diplome && $f->niveau === 'LICENCE')
                                        @if($a->id_annee==5)
                                            <span class="progress border border-primary my-0" style="display: inline-block; width: 50%"><i class="progress-bar progress-bar-striped" role="progressbar" style="width: 62%" aria-valuenow="62" aria-valuemin="0" aria-valuemax="100">62%</i></span>
                                            <span id="info{{$a->id_annee}}" class="informations"><i class="fa fa-fw fa-2x text-dark fa-info-circle my-1" title="Details" style="cursor: pointer"></i></span>
                                        @else
                                            <span class="progress border border-primary my-0" style="display: inline-block; width: 50%"></span>
                                            <span id="info{{$a->id_annee}}" class="informations"><i class="fa fa-fw fa-2x text-dark fa-info-circle my-1" title="Details" style="cursor: pointer"></i></span>
                                        @endif
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
                            <p class="mx-3 lead"><b onclick="menuFiliere('scienceMa','scienceIconMa')" style="cursor: pointer"><i id="scienceIconMa" class="fa fa-fw fa-plus"></i> Master</b></p>
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
                        <div style="display: none" name="scienceMa" class="col-md-4 my-4">
                            <br><br>
                            <p></p>
                            @foreach($annees as $a)
                                @foreach($filieres as $f)
                                    @if($a->id_diplome==$f->id_diplome && $f->niveau === 'MASTER')
                                        @if($a->id_annee<3)
                                            <span class="progress border border-primary my-0" style="display: inline-block; width: 50%"><i class="progress-bar progress-bar-striped" role="progressbar" style="width: 37%" aria-valuenow="37" aria-valuemin="0" aria-valuemax="100">37%</i></span>
                                            <span id="info{{$a->id_annee}}" class="informations"><i class="fa fa-fw fa-2x text-dark fa-info-circle my-1" title="Details" style="cursor: pointer"></i></span>
                                        @else
                                            <span class="progress border border-primary my-0" style="display: inline-block; width: 50%"></span>
                                            <span id="info{{$a->id_annee}}" class="informations"><i class="fa fa-fw fa-2x text-dark fa-info-circle my-1" title="Details" style="cursor: pointer"></i></span>
                                        @endif
                                    @endif
                                @endforeach
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif

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
                                <p> Votre participation à cette filière : <span id="participation"></span></p>
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

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    </body>
    </html>

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
                        document.getElementById("participation").innerHTML ="37%";
                        document.getElementById("niveauInfo").innerHTML = filieres[0].niveau;
                        document.getElementById("libelleDInfo").innerHTML = filieres[0].libelle;
                    }
                    else
                    {
                        if(i==5)
                        {
                            document.getElementById("participation").innerHTML ="62%";
                        }
                        else if(i>=3)
                        {
                            document.getElementById("participation").innerHTML ="0%";
                        }
                        document.getElementById("niveauInfo").innerHTML = filieres[1].niveau;
                        document.getElementById("libelleDInfo").innerHTML = filieres[1].libelle;
                    }
                }

            }
            $("#details").modal("show");
        });

    </script>

@endsection