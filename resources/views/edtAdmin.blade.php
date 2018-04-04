

<?php
use App\Http\Controllers\EDTController;
?>
@extends('layouts.app')

@section('css')
<style>
    td, th {border: 1px solid rgba(0, 0, 0, 0.52);}
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
        border-bottom: 0px;
    }
    tr:first-child td {
        border: 1px solid rgba(0, 0, 0, 0.52);
        padding:.7rem;

    }
    tr:last-child td {
        border-bottom: 1px solid rgba(0, 0, 0, 0.52);
    }
    .table td {
        padding:.2rem;
    }

</style>
@endsection
@section('content')


    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="btn-group">
                        <button class="btn btn-outline-primary dropdown-toggle" data-toggle="dropdown">Classe</button>
                        <div class="dropdown-menu">
                            @foreach ($classes as $classe)
                                <a class="dropdown-item" href="#">{{$classe->diplome->libelle}}  {{$classe->libelle}} </a>
                            @endforeach 
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="btn-group">
                        <button class="btn btn-outline-primary dropdown-toggle" data-toggle="dropdown">Semaine&nbsp;</button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Semaine 1</a>
                            <a class="dropdown-item" href="#">Semaine 2</a>
                            <a class="dropdown-item" href="#">Semaine 3</a>
                            <a class="dropdown-item" href="#">Semaine 4</a>
                            <a class="dropdown-item" href="#">Semaine 5</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <a href="#" data-toggle="modal" data-target="#ajout" class="btn btn-outline-primary">Ajouter un cours</a>
                </div>
            </div>
        </div>
    </div>
        <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <table class="table" id="table_edt">
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
                                                $seance = EDTController::getHoraire($seances, strtotime($date . ' +'.$i.' day'), $j, 15*$k);
                                                if($seance != null) {
                                                    $ecart = $seance->getEcart();
                                                    echo "<td style='background:red' colspan='".$ecart."' class=\"tr-inner\" id=\"table{{$i}}{{$j}}\">".$seance->matiere->libelle."</td>";
                                                    $k = $k+$ecart;

                                                } else {
                                                    echo "<td class=\"tr-inner\" id=\"table{{$i}}{{$j}}\"></td>";

                                                }
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
