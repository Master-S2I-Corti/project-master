


@extends('layouts.app')


@section('content')

    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="btn-group">
                        <button class="btn btn-outline-primary dropdown-toggle" data-toggle="dropdown">Classe</button>
                        <div class="dropdown-menu">
                            @foreach ($classes as $classe)
                            
                            <a class="dropdown-item" href="#"> {{$classe->libelle}} {{$classe->diplome()->libelle}}</a>
                            
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
                    <table class="table">
                        <thead>
                        <tr>
                            <th></th>
                            <th>Lundi</th>
                            <th>Mardi</th>
                            <th>Mercredi</th>
                            <th>Jeudi</th>
                            <th>Vendredi</th>
                            <th>Samedi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>8h-9h</td>
                            <td class="bg-success text-center">UE1-FONDAMENTAUX-DU-WEB-ET-MOBILE-FA
                                <br>&nbsp;Santucci,&nbsp;Jean-Francois
                                <br>113</td>
                            <td class="text-center"></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>9h-10h</td>
                            <td class="text-center bg-success">UE1-FONDAMENTAUX-DU-WEB-ET-MOBILE-FA
                                <br>&nbsp;Santucci,&nbsp;Jean-Francois
                                <br>&nbsp;113</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>10h-11h</td>
                            <td class="text-center bg-success">UE1-FONDAMENTAUX-DU-WEB-ET-MOBILE-FA &nbsp;&nbsp;
                                <br>Santucci,&nbsp;Jean-Francois &nbsp;
                                <br>113</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>11h-12h</td>
                            <td class="text-center bg-success">UE1-FONDAMENTAUX-DU-WEB-ET-MOBILE-FA &nbsp;
                                <br>Santucci,&nbsp;Jean-Francois &nbsp;
                                <br>113</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>12h-13h</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>13h-14h</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>14h-15h</td>
                            <td class="text-center bg-warning">UE4-ADMINISTRATION-SYSTEMES-ET-RESEAUX
                                <br>FRANCK ABELLI
                                <br>113&nbsp;</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>15h-16h</td>
                            <td class="text-center bg-warning">UE4-ADMINISTRATION-SYSTEMES-ET-RESEAUX
                                <br>FRANCK ABELLI
                                <br>113&nbsp;</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>16h-17h</td>
                            <td class="bg-warning text-center">UE4-ADMINISTRATION-SYSTEMES-ET-RESEAUX
                                <br>FRANCK ABELLI
                                <br>113&nbsp;</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>17h-18h</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>18h-19h</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
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


    @include("edtAjout")
@endsection
