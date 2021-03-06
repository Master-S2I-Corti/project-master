<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="https://studia.universita.corsica/template/template_portails/css/favicon.ico"
          type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/base.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/password-bar.css') }}"/>

    <script type="text/javascript" src="{{ asset('js/jquery.min.js')}}"></script>

    <script src="{{ asset('js/popper.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js')}}"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">



    <title>ENT - Université de Corse</title>
    @yield('css')
</head>
<body style="overflow: hidden">

<div>
    @auth()
        <div id="menu">
            <div>
                <div class="d-flex align-items-center">
                    <button class="toggleMenu btn background-none btn-lg m-2"><i class="fa fa-bars fa-lg "></i> </button>
                    <a class="navbar-brand" href="{{URL::to("/")}}"><img class="logo img-fluid" src="{{asset("img/logo.png")}}">Università di Corsica</a>

                </div>
                <div id="items-menu">
                @if(Auth::user()->isAdmin())
                        <?php echo \App\Http\Controllers\MenuController::itemsMenu("Administrateur", "admin") ?>
                @endif

                @if(Auth::user()->isEtudiant())
                        <?php echo \App\Http\Controllers\MenuController::itemsMenu("Etudiant", "etudiant") ?>
                @endif
                @if(Auth::user()->isEnseignant())
                        <?php echo \App\Http\Controllers\MenuController::itemsMenu("Enseignant", "enseignant") ?>
                @endif
                </div>
            </div>
        </div>
    @endauth

    <div >
        @include('layouts.header')

<!--
        @guest
            @include('layouts.connexion')
        @endguest
-->
        <div id="conteneur" style="overflow: auto; height: calc(100vh - 66px)">
            @yield('content')
            @include('layouts.footer')
        </div>
    </div>
</div>

@yield('script')

<script>
    $(function () {

    $(".toggleMenu").click(function (e) {
        $("#menu").toggleClass("openMenu")
    });
    $("#conteneur").click(function () {
        $("#menu").removeClass("openMenu")
    });
    
    });

    

</script>
    <script type="text/javascript" src="{{ asset('js/application.js')}}"></script>
</body>
</html>