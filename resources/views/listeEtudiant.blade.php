
@extends('layouts.app')


@section('content')

    <div class="pt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
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
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>9h-10h</td>
                            <td class="text-center bg-warning">UE1-FONDAMENTAUX-DU-WEB-ET-MOBILE-FA
                                <br>Santucci, Jean-Francois
                                <br>113 </td>
                            <td></td>
                            <td class="bg-success text-center">UE3-CONCEPTION-AGILE-FA
                                <br>MARIELLE DELHOM
                                <br>113</td>
                            <td></td>
                            <td class="text-center bg-info">UE4-ADMINISTRATION-SYSTEMES-ET-RESEAUX
                                <br>FRANCK ABELLI
                                <br>113&nbsp;</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>10h-11h</td>
                            <td class="text-center bg-warning">UE1-FONDAMENTAUX-DU-WEB-ET-MOBILE-FA
                                <br>Santucci, Jean-Francois
                                <br>113</td>
                            <td class="text-center bg-info">UE2-PROGRAMMATION-ORIENTEE-OBJET-DISTRIBUEE
                                <br>PAUL-ANTOINE BISGAMBIGLIA
                                <br>113</td>
                            <td class="bg-success text-center">UE3-CONCEPTION-AGILE-FA MARIELLE DELHOM
                                <br>113</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>11h-12h</td>
                            <td></td>
                            <td class="text-center bg-info">UE2-PROGRAMMATION-ORIENTEE-OBJET-DISTRIBUEE
                                <br>PAUL-ANTOINE BISGAMBIGLIA
                                <br>113</td>
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
                            <td class="text-center bg-info">UE1-FONDAMENTAUX-DU-WEB-ET-MOBILE-FA&nbsp;
                                <br>Santucci, Jean-Francois
                                <br>113</td>
                            <td class="text-center bg-success">UE2-PROGRAMMATION-ORIENTEE-OBJET-DISTRIBUEE
                                <br>&nbsp;PAUL-ANTOINE BISGAMBIGLIA&nbsp;
                                <br>113</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>14h-15h</td>
                            <td class="text-center bg-info">UE1-FONDAMENTAUX-DU-WEB-ET-MOBILE-FA
                                <br>Santucci, Jean-Francois&nbsp;
                                <br>113</td>
                            <td class="text-center bg-success">UE2-PROGRAMMATION-ORIENTEE-OBJET-DISTRIBUEE
                                <br>&nbsp;PAUL-ANTOINE BISGAMBIGLIA
                                <br>&nbsp;113</td>
                            <td></td>
                            <td class="text-center bg-warning">Hack4Corsica
                                <br>&nbsp;PAUL-ANTOINE BISGAMBIGLIA&nbsp;
                                <br>Remarque: Palazzu</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr class="text-center">
                            <td>15h-16h</td>
                            <td></td>
                            <td class="bg-success text-center">UE2-PROGRAMMATION-ORIENTEE-OBJET-DISTRIBUEE
                                <br>&nbsp;PAUL-ANTOINE BISGAMBIGLIA&nbsp;
                                <br>113</td>
                            <td></td>
                            <td class="bg-warning">Hack4Corsica &nbsp;PAUL-ANTOINE BISGAMBIGLIA&nbsp; Remarque: Palazzu </td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>16h-17h</td>
                            <td></td>
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
    <div class="pb-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <a href="#" class="btn btn-outline-primary">Imprimer</a>
                </div>
            </div>
        </div>
    </div>
@endsection