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
    <script type="text/javascript" src="{{ asset('js/jquery.min.js')}}"></script>

    <script src="{{ asset('js/popper.min.js')}}"></script>

    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js')}}"></script>
    <script src="https://use.fontawesome.com/1844c64849.js"></script>


    <title>ENT - Université de Corse</title>
    @yield('css')
</head>
<body style="overflow: hidden">

<div>
    <div id="menu">

        <button class="toggleMenu" class=" btn-dark">OPEN</button>
        <div>

            <p>sdsdsdd</p>
        </div>
    </div>
    <div>
        @include('layouts.header0')

        @guest
            @include('layouts.connexion')
        @endguest
        <div style="overflow: auto; height: calc(100vh - 66px)">
            @yield('content')
            @include('layouts.footer')
        </div>
    </div>
</div>

@yield('script')

<script>
    $(function () {

    $(".toggleMenu").click(function (e) {
        console.log("sala")
        $("#menu").toggleClass("openMenu")


    })
    @if ($errors->any())
        $('#connexionModal').modal('show');
    @endif
    });

</script>

</body>
</html>