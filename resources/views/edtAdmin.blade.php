
@extends('layouts.app')

@section('css')
<style>
    td, th {border: 1px solid rgb(166, 166, 166);}
    table {border-collapse : collapse;}
    .heure, .minute {
        text-align: end;
        vertical-align: middle;
    }
    .minute {
        font-size: 12px;
        color:gray;
        font-style: italic;
    }
    .tr-inner {
        border-bottom: 0;
        width: 13%;
    }
    .tr-cours {
        background: #1e7e34;
        color:white;
        text-align: center;
        vertical-align: middle !important;
    }

    tr:first-child td {
        border: 1px solid rgb(166, 166, 166);
        padding:.7rem;

    }
    tr:first-child {
        background: #343a40!important;
        color: white;
        text-transform: capitalize;
    }
    tr:last-child td {
        border-bottom: 1px solid rgb(166, 166, 166);
    }
    .table td {
        padding:.2rem;
    }
    input {
        width: 100%;
    }
    .table {
        border-radius: 10px;
        box-sizing: border-box;
    }

</style>
@endsection
@section('content')

    <script>

        Date.prototype.toHHMM = function () {
            var minutes = this.getMinutes();
            var time = this.getHours()+':';
            time += minutes < 10 ? "0"+minutes : minutes
            return time;
        };

        function getMonday(d) {
            d = new Date(d);
            var day = d.getDay(),
                diff = d.getDate() - day + (day === 0 ? -6:1); // adjust when day is sunday
            return new Date(d.setDate(diff));
        }


        function getBeginTime(hours, minutes) {
            return ((hours-8)*4+(minutes/15))+2;
        }

        function removeItemOverflow(colonnes, counter) {
            for(var i=colonnes.length-1; i > (colonnes.length-counter); i--) {
                colonnes[i].outerHTML="";
            }
        }



        function loadWeek(week) {
            $.getJSON("{{URL::to("seances/week/")}}/"+week, function (data) {
                var date = getMonday(new Date("{{$date}}"));
                reverse_table(document.getElementById("table_edt"));

                for (var i = 1; i < 7; i++) {
                    var counter = 0;
                    var counter2 = 0;
                    var colonne = $(document.querySelectorAll("tr")[i]).find("td");
                    var seanceDay = data.filter(function (seance) {

                        return (new Date(Date.parse(seance.date_seance)).getDate() === date.getDate());
                    }).sort(function (e, e1) {
                        var time = e.heure_debut.split(":");
                        var time2 = e1.heure_debut.split(":");
                        return parseInt(time[0]) > parseInt(time2[0]);
                    });
                    seanceDay.forEach(function (seance) {
                        var time = seance.heure_debut.split(":");
                        var tdIndex = getBeginTime(parseInt(time[0]), parseInt(time[1]))-counter2;
                        console.log(tdIndex+"   "+counter);
                        counter += seance.ecart;
                        counter2 = counter-1;
                        var ligne = colonne[tdIndex];
                        ligne.colSpan = seance.ecart;
                        ligne.classList.add("tr-cours");
                        ligne.innerHTML = seance.matiere + "<br/>" + seance.heure_debut + "-" + seance.heure_fin + "<br/>" + seance.prenom + " " + seance.nom + "<br/>" + seance.id_salle;
                    });
                    date.setDate(date.getDate() + 1);
                    removeItemOverflow(colonne, counter-(seanceDay.length-1));

                }

                reverse_table(document.getElementById("table_edt"));

            });
        }
        loadWeek({{$week}});
    </script>

    <div class="container mt-4">
            <div class="d-flex justify-content-between">
                <div>
                    <div class="btn-group">
                        <button class="btn btn-outline-primary dropdown-toggle" data-toggle="dropdown">Classe</button>
                        <div class="dropdown-menu">
                            @foreach ($classes as $classe)
                                <a class="dropdown-item" href="#">{{$classe->diplome->libelle}}  {{$classe->libelle}} </a>
                            @endforeach 
                        </div>
                    </div>
                </div>
                <div>
                    <a href="#" data-toggle="modal" id="btAjout" data-target="#ajout" class="btn btn-outline-primary">Ajouter un cours</a>
                </div>
            </div>
            <div class="d-flex justify-content-between mt-3">
                <a href="{{URL::to("/gestion/edt/")}}/{{$week - 1}}" class="btn btn-secondary"><i class="fa fa-angle-left fa-lg d-inline align-middle mr-2"></i>Précédent</a>
                
                <h3>Semaine {{$week}}</h3>
                
                <a href="{{URL::to("/gestion/edt/")}}/{{$week + 1}}" class="btn btn-secondary">Suivant <i class="fa fa-angle-right fa-lg d-inline align-middle ml-2"></i></a>
            </div>

    </div>
        <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped" id="table_edt">
                        <tbody>
                        <tr>
                            <td></td>
                            @for ($j = 8; $j < 22; $j++)
                                <td class="heure" colspan="2">{{$j}}:00 -</td>
                                <td class="minute" colspan="2">{{$j}}:30</td>
                            @endfor
                        </tr>
                        @for ($i = 0; $i < 7; $i++)
                            <tr>
                                <td style="text-align: end">{{strftime("%a %d %b", strtotime($date . ' +'.$i.' day'))}}</td>
                                @for ($j = 8; $j < 22; $j++)
                                    @for ($k = 0; $k < 4; $k++)
                                        <?php
                                                echo "<td class=\"tr-inner\"></td>";
                                        ?>
                                        @endfor
                                @endfor
                            </tr>
                        @endfor


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <a href="#" class="btn btn-outline-primary"><i class="fa fa-user fa-fw"></i>Imprimer</a>
                </div>
                <div class="col-md-6">
                    <a href="#" class="btn btn-outline-primary">Modifier</a>
                </div>
            </div>
        </div>
    </div>

    <script>

        var copyStyle = function(source, dest)
        {
            dest.style.cssText = source.style.cssText;
            dest.className = source.className;
            dest.id = source.id;
        }

        var reverse_table = function(thetable)
        {
            var rtable = thetable.cloneNode(false);
            var rtable_body = rtable.appendChild(document.createElement("tbody"));

            // On compte les colonnes
            var tableNumCols = 0;
            for(var tdi = 0; tdi < thetable.rows[0].cells.length; tdi++)
            {
                tableNumCols += thetable.rows[0].cells[tdi].colSpan;
            }

            // On compte les lignes
            var tableNumRows = 0;
            for(var tri = 0; tri < thetable.rows.length; tri++)
            {
                tableNumRows += thetable.rows[tri].cells[0].rowSpan;
            }

            // on crée les tr dont on a besoin
            var rtable_trs = Array();
            var rowSpanDuration = Array();
            var rowSpanValue = Array();
            var cols = thetable.getElementsByTagName("col");
            for(var tri = 0; tri < tableNumCols; tri++)
            {
                var current_tr = document.createElement("tr");
                if(tri < cols.length)
                {
                    copyStyle(cols[tri], current_tr);
                }
                rtable_trs[tri] = current_tr;
                rtable_body.appendChild(current_tr);
                rowSpanDuration[tri] = 1;
                rowSpanValue[tri] = 1;
            }

            // On va retourner le tableau maintenant
            var celli = 0;
            for(var tri = 0; tri < thetable.rows.length; tri++)
            {
                var col = document.createElement("col");

                copyStyle(thetable.rows[tri], col);
                rtable.appendChild(col);

                for(var tdi = 0; tdi < thetable.rows[tri].cells.length; tdi++)
                {
                    var cell = thetable.rows[tri].cells[tdi].cloneNode(true);

                    // Calcul de la position d'insertion
                    var rowOfInsertion = celli % tableNumCols;

                    // Gestion des row span
                    var rsdi = rowOfInsertion;

                    while(rowSpanDuration[rsdi] > 1)
                    {
                        celli += rowSpanValue[rsdi];
                        rowOfInsertion = celli % tableNumCols; // maj de la position d'insertion
                        rowSpanDuration[rsdi]--;
                        rsdi = rowOfInsertion;
                    }
                    rowSpanDuration[rsdi] += cell.rowSpan - 1;
                    rowSpanValue[rsdi] = cell.colSpan;

                    // échanger rowSpan and colSpan
                    var colSpan = cell.colSpan;
                    cell.colSpan = cell.rowSpan;
                    cell.rowSpan = colSpan;

                    // Insertion de la cellule
                    rtable_trs[rowOfInsertion].appendChild(cell);

                    // Gestion des col span
                    celli += colSpan; // colSpan vaut 1 pour une cellule classique
                }
            }

            thetable.parentNode.replaceChild(rtable, thetable);

        }
        reverse_table(document.getElementById("table_edt"));

    </script>
    @include("edtAjout")
@endsection
