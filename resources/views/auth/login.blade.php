@extends('layouts.app')



@section('content')
    <h1>Vous devez vous connecter</h1>
@endsection

@section('script')
    <script>
        $(function () {
            $('#connexionModal').modal('show');
        });
    </script>
@endsection