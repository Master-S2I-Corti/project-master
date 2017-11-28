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
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/base.css') }}"/>
    <script type="text/javascript" src="{{ asset('js/jquery.min.js')}}"></script>

    <script src="{{ asset('js/popper.min.js')}}"></script>

    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js')}}"></script>

    <title>{{ config('app.name', 'Laravel') }}</title>
    @yield('css')
</head>
<body>
@include('layouts.header')


@include('layouts.connexion')


@yield('content')
@include('layouts.footer')

@yield('script')

<script>
    $(function () {
        @if ($errors->any())
            $('#connexionModal').modal('show');
        @endif
})
</script>

</body>
</html>