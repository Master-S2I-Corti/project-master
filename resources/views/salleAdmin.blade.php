@extends('layouts.app')



@section('content')


<div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <a class="btn btn-primary text-center text-white" href="{{ URL::to("/gestion/salles/add") }}">CREATION D'UNE SALLE</a>
        </div>
      </div>
    </div>
  </div>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12"> </div>
      </div>
    </div>
  </div>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <a class="btn btn-primary" href="{{ URL::to("/gestion/salles/groupes") }}">CREATION D'UN GROUPE DE SALLES</a>
        </div>
      </div>
    </div>
  </div>

@endsection
