@extends('layouts.app')

@section('css')
    <style>

        .dropdown {
            position: relative;
            display: inline-block;
            z-index: 1000;
        }


        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #f1f1f1
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown:hover .dropbtn {
            background-color: #3e8e41;
        }
    </style>
@endsection

@section('content')
    <div class="container" id="couco" style="left: 10px; z-index:1; width:100%; top:60px; display:none ">
        <div class="alert alert-success alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a> <strong>Success!</strong> This alert box could indicate a successful or positive action.
        </div>
    </div>
    <div class="">
        <div class="container">
            <div class="row">
                <div class="col-md-12 px-5" style="padding:10px; top:15px;">
                    <div class="row">
                        <div class="col-md-6">

                            <div class="row">
                                <div class="form-group col-md-4 p-0">
                                    <select class="form-control" id="sel1">
                                        <option value="">M1 S2I</option>
                                        <option value="">L3 INFO</option>

                                    </select>
                                </div>

                                <div class="form-group col-md-4">
                                    <select class="form-control" id="sel1">
                                        <option value="">Semestre 1</option>
                                        <option value="">Semestre 2</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-4 p-0">
                                    <select class="form-control" id="sel1">
                                        <option value="">Fondamentaux web mobile</option>

                                        @if(count($data['matiere'])>=1)

                                            @foreach($data['matiere'] as $matiere)
                                                <option value="">{{$matiere->matiere}}</option>
                                            @endforeach

                                        @endif

                                    </select>
                                </div>
                            </div>



                        </div>
                        <div class="col-md-2">
                            <button  data-target="#modal_tdtpcc"  data-toggle="modal" class="btn btn-primary d-flex align-items-center" type="button"> <i class="material-icons">add</i> TD TP CC</button>
                        </div>



                        <div class="col-md-4  p-0">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="" aria-label="Search for...">
                                <button class="btn btn-primary d-flex align-content-center" type="button"> <i class="material-icons">search</i></button>
                            </div>
                        </div>


                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Nom</th>
                                <th>Prenom</th>
                                <th class="w-25">Moyenne</th>
                                <th class="w-20" style="width:20px;">Modifier</th>
                            </tr>
                            </thead>
                            <tbody >
                            <tr>
                                <td>1</td>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>12.80</td>
                                <td><i class="material-icons" data-target="#myModal" data-toggle="modal">edit</i></td>
                            </tr>
                            <tr style="color:red">
                                <td>2</td>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>---</td>
                                <td><i class="material-icons">edit</i></td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Larry</td>
                                <td>the Bird</td>
                                <td>15.12</td>
                                <td><i class="material-icons">edit</i></td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td class="">Larry</td>
                                <td>the Bird</td>
                                <td>15.12</td>
                                <td><i class="material-icons">edit</i></td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Larry</td>
                                <td>the Bird</td>
                                <td>15.12</td>
                                <td><i class="material-icons">edit</i></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>10.50</td>
                                <td><i class="material-icons">edit</i></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>10.50</td>
                                <td><i class="material-icons">edit</i></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>10.50</td>
                                <td><i class="material-icons">edit</i></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>



        <!-- Modal -->
        <div class="modal" id="myModal" role="dialog">
            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="d-flex align-items-center modal-title" style="border-right:solid silver 1px; padding-right:20px; display:inline-block;"><i class="material-icons">account_circle</i> Mark Otto</h5> <span style="margin-left:20px; color: #007bff;"> Web Semantique</span>
                        <button type="button" class="close" data-dismiss="modal">×</button>
                    </div>

                    <div class="modal-body">

                        <table class="table table-striped" id="tab">
                            <thead>
                            <tr>
                                <th>Type</th>
                                <th>Coef</th>
                                <th>Note</th>
                            </tr>
                            </thead>

                            <tbody>

                            <tr>
                                <td class="w-25">TD</td>

                                <td class="w-25">
                                    1
                                </td>

                                <td class="w-25">
                                    <input type="text" value="12" class="form-control form-control-sm w-50">
                                </td>


                            </tr>

                            <tr>
                                <td class="w-25">TP</td>
                                <td class="w-25">2</td>
                                <td class="w-25"><input type="text" class="form-control form-control-sm w-50" value="10.25"> </td>
                            </tr>

                            <tr>
                                <td class="w-25">CC</td>
                                <td class="w-25">3 </td>
                                <td class="w-25"><input type="text" value="14.25" class="form-control form-control-sm w-50"> </td>
                            </tr>

                            </tbody>
                        </table>
                        <h5 style="padding:5px;float:right;">Moyenne : 12.80</h5>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-success" data-dismiss="modal" data-toggle="modal" onclick="AfficherMasquer()">Enregistrer</button>
                        <script>
                            function AfficherMasquer()
                            {
                                divInfo = document.getElementById('couco');
                                if (divInfo.style.display == 'none')
                                    divInfo.style.display = 'block';

                                else
                                    divInfo.style.display = 'none';
                            }
                        </script>
                    </div>
                </div>
            </div>
        </div>


        <!-- Modal 2-->
        <div class="modal" id="modal_tdtpcc" role="dialog">
            <div class="modal-dialog modal-md">
                <!-- Modal content-->
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" style="border-right:solid silver 1px; padding-right:20px; display:inline-block;"><i class="fa fa-graduation-cap "></i> Mark Otto</h5> <span style="margin-left:20px; color: #007bff;"> Web Semantique</span>
                        <button type="button" class="close" data-dismiss="modal">×</button>
                    </div>

                    <div class="modal-body">

                        <table class="table table-striped" id="tab">
                            <thead>
                            <tr>
                                <th># &nbsp;<i class="fa fa-plus fa-lg d-inline text-success insertLine"></i></th>
                                <th>Coef</th>
                                <th></th>
                            </tr>
                            </thead>

                            <tbody id="cTable">


                            @if(count($data['evaluation'])>=1)

                                @foreach($data['evaluation'] as $evaluation)

                                    <tr id="ligne_{{$evaluation->id_eval}}">
                                        <input type="hidden" name="" value="{{$evaluation->id_eval}}">
                                        <td class="w-25">{{$evaluation->type}}</td>

                                        <td>
                                            <input type="number" value="{{$evaluation->coef}}" min="0" max="5" class="form-control form-control-sm w-25">
                                        </td>

                                        <td><i class="fa fa-lg d-inline removeLine dbRemoveEval text-danger fa-trash-o" id="{{$evaluation->id_eval}}"></i></td>

                                    </tr>

                                @endforeach

                            @endif




                            <!--     <tr>
                  <td>TP</td>
                  <td><input type="number" value="2" class="form-control form-control-sm w-25"> </td>

                  <td><i class="fa fa-lg d-inline removeLine fa-trash-o text-danger"></i></td>
                </tr>

                <tr>
                  <td>CC</td>
                  <td><input type="number" value="3" class="form-control form-control-sm w-25"> </td>

                  <td><i class="fa fa-lg d-inline removeLine fa-trash-o text-danger"></i></td>
                </tr> -->

                            </tbody>
                        </table>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-success" data-dismiss="modal" data-toggle="modal" onclick="AfficherMasquer()">Enregistrer</button>
                        <script>
                            function AfficherMasquer()
                            {
                                divInfo = document.getElementById('couco');
                                if (divInfo.style.display == 'none')
                                    divInfo.style.display = 'block';

                                else
                                    divInfo.style.display = 'none';
                            }
                        </script>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="modal text-center" id="coucou">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                </div>
                <div class="modal-body">
                    <p></p>
                    <h5>Enregistrement effectué</h5>
                    <p></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('document').ready(function(){
            $('.insertLine').click(function(){
                $('#cTable').prepend('<tr><td class="w-25"><select name="" id=""><option value="">TD</option><option value="">TP</option> <option value="">CC</option></select></td> <td class=""><input type="number" class="form-control form-control-sm w-25" value="0" min="0" max="5"> </td> <td><i class=" d-inline removeLine materiel-icons text-danger">delete</i></td></tr>');
            });

            $('body').on('click','.removeLine',function(){
                if (confirm("Êtes-vous sûr de vouloir supprimer la ligne ?") == true) {
                    if($(this).hasClass("dbRemoveEval"))
                    {
                        // Traitement Ajx Supression Evaluation Base
                        var idTodelete=$(this).attr("id");
                        $.post('deleteEval',{idEvalTodelete:idTodelete},function($data){
                            $('#ligne_'+idTodelete).remove();
                        });

                    } else {
                        $(this).parent().parent().remove(); // pour l'autre partie les lignes inserées auto
                    }
                }
            });
        });
    </script>
@endsection