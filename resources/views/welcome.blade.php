@extends('layouts.app')



@section('content')
    @guest
    <div class="jumbotron">
        <div class="container">
            <h1 class="display-3">Bienvenue sur l'ENT de l'Université de Corse</h1>
            <p>Votre Environnement Numérique de Travail (ENT) est le portail d'accès à vos services numériques et informations personnalisées via une authentification unique.</p>
            <p><a class="btn btn-primary btn-lg" href="#" role="button">Détails »</a></p>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h2>Emploi du temps</h2>
                <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
            </div>
            <div class="col-md-4">
                <h2>Note</h2>
                <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
            </div>
            <div class="col-md-4">
                <h2>Cours</h2>
                <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
            </div>
        </div>

        <hr>
    </div>
    @else
        <h1>Bienvenue sur votre espace</h1>
    @endguest
@endsection