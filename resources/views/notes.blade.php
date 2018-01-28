@extends('layouts.app')

@section('css')
    <style>
        .nav-item:nth-child(2) a {
            color: white !important;
        }
    </style>
@endsection

@section('content')
    <div class="">
        <div class="container">
            <div class="row">
                <div class="px-5 m-5">
                    <div class="row">
                        <div class="d-flex justify-content-between w-100">
                            <h1 class="">Mark Otto</h1>
                            <div class="form-group col-md-4 p-0 align-items-center">
                                <select class="form-control" id="sel1">
                                    <option value="">Semestre 1</option>
                                    <option value="">Semestre 2</option>
                                </select>
                            </div>
                        </div>
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th class="w-25">#</th>
                                <th class="w-25">UE</th>
                                <th class="w-25">Resultat</th>
                                <th class="w-25">Moyenne</th>
                                <th class="w-20" style="width:20px;">Consulter</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr style="color:red">
                                <td>1</td>
                                <td class="w-25">Fondamentaux web mobile</td>
                                <td> NACQ</td>
                                <td>9.90</td>
                                <td><i class="fa fa-fw fa fa-eye fa-lg" data-target="#myModal" data-toggle="modal"></i>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Android</td>
                                <td>ABI</td>
                                <td>---</td>
                                <td><i class="fa fa-fw fa fa-eye fa-lg" data-target="#myModal" data-toggle="modal"></i>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Programmation Orientee objet</td>
                                <td>INDISPO</td>
                                <td>INDISPO</td>
                                <td><i class="fa fa-fw fa fa-eye fa-lg" data-target="#myModal" data-toggle="modal"></i>
                                </td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td class="">Conception agile, base données</td>
                                <td>ACQ</td>
                                <td>15.12</td>
                                <td><i class="fa fa-fw fa fa-eye fa-lg" data-target="#myModal" data-toggle="modal"></i>
                                </td>
                            </tr>
                            <tr style="color:red">
                                <td>5</td>
                                <td>Pvp</td>
                                <td>NACQ</td>
                                <td>8.20</td>
                                <td><i class="fa fa-fw fa fa-eye fa-lg" data-target="#myModal" data-toggle="modal"></i>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <br>
                    <div class="row p-1" style="border-top: solid silver 1px;">
                        <div class="d-flex justify-content-between w-100">
                            <legend style="font-size: 20px;color: #000; padding-top: 5px;">
                                Moyenne Générale : 10.97 ( / 20.00)
                            </legend>
                            <button class="btn btn-primary d-flex align-items-center">Télécharger un bulletin <i class="ml-2 fa fa-download"></i></button>
                        </div>
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
                        <h5 class="modal-title"
                            style="border-right:solid silver 1px; padding-right:20px; display:inline-block;"><i
                                    class="fa fa-graduation-cap mr-2"></i>Etudiant</h5> <span
                                style="margin-left:20px; color: #007bff;"
                                class="text-muted"> Fondamentaux web mobile</span>
                        <button type="button" class="close" data-dismiss="modal">×</button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Module</th>
                                <th>Coef</th>
                                <th>Note</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Archi et techo</td>
                                <td>1</td>
                                <td> 10.25</td>
                            </tr>
                            <tr>
                                <td>Programmation PHP</td>
                                <td>2</td>
                                <td> 10.25</td>
                            </tr>
                            <tr>
                                <td>
                                    <font color="red">Projet developpement site</font>
                                </td>
                                <td>
                                    <font color="red">3</font>
                                </td>
                                <td>
                                    <font color="red">9 </font>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <h5 style="padding:5px;float:right;">Moyenne : 9.90</h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default w-25 btn-secondary" data-dismiss="modal">Fermer
                        </button>
                    </div>
                </div>
            </div>
        </div>
@endsection