@extends('layouts.app')

@section('css')
    <style>
        .nav-item:nth-child(1) a {
            color: white !important;
        }
    </style>
@endsection

@section('content')
    <div class="padding-10 d-flex justify-content-between">
        <div class="">
            <h2>Semaine 51</h2>
        </div>
        <div class="">
            <button class="rounded-circle border-0 bg-second text-white btn-change"><i class="d-inline fa fa-angle-left fa-lg" ></i></button>
            <button class="rounded-circle border-0 bg-second text-white btn-change"><i class="d-inline fa fa-angle-right fa-lg"></i></button>
        </div>
    </div>

    <table class="table">
        <thead>
        <tr>
            <th>Lundi</th>
            <th>Mardi</th>
            <th>Mercredi</th>
            <th>Jeudi</th>
            <th>Vendredi</th>
            <th>Samedi</th>
            <th>Dimanche</th>
        </tr>
        </thead>
        <tbody>

        <tr>

        </tr>
        </tbody>


    </table>
    <script>

    </script>
@endsection