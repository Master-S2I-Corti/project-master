@extends('layouts.app')

@section("css")
    <style>
        .jumbotron img {
            width: 100%;
        }
    </style>

@endsection

@section('content')

    <div class="contrainer jumbotron">
        <div class="w-75 align-content-around d-flex justify-content-center flex-wrap m-auto ">
            @if(Auth::user()->isAdmin())
                <?php echo \App\Http\Controllers\MenuController::menu("Fonctionnalités administrateur", "admin") ?>
            @endif

            @if(Auth::user()->isEtudiant())
                <?php echo \App\Http\Controllers\MenuController::menu("Fonctionnalités étudiantes", "etudiant") ?>
            @endif
            @if(Auth::user()->isEnseignant())
                <?php echo \App\Http\Controllers\MenuController::menu("Fonctionnalités enseignantes", "enseignant") ?>
            @endif
        </div>
    </div>

@endsection
