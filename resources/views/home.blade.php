@extends('layouts.app')



@section('content')

    <div class="contrainer jumbotron">
        <div class="w-75 align-content-around d-flex justify-content-center flex-wrap m-auto ">
            @if(Auth::user()->isAdmin())
                @include("home.admin")
            @endif

            @if(Auth::user()->isEtudiant())
                @include("home.etudiant")
            @endif
            @if(Auth::user()->isEnseignant())
                @include("home.enseignant")
            @endif
        </div>
    </div>

@endsection
