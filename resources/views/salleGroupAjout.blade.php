@extends('layouts.app')



@section('content')

<div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="py-5">
              <div class="container">
                <div class="row">
                  <div class="col-md-12">
                    <h1 class="">De</h1>
                  </div>
                  <div class="row">
                    <input type="number"> </div>
                  <div class="col-md-12">
                    <h1 class="">A</h1>
                  </div>
                  <div class="row">
                    <input type="number"> </div>
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
            <div class="col-md-6">
              <div class="py-5">
                <div class="container">
                  <div class="row">
                    <div class="col-md-12">
                      <h1 class="pb-3 bg-light">GESTION DES SALLES</h1>
                    </div>
                    <div class="card-body p-5">
                      <form action="https://formspree.io/YOUREMAILHERE">
                        <div class="form-group"> <label>Nombre d'heures réservées</label>
                          <input type="number" class="form-control form-control-lg" placeholder="0"> </div>
                        <div class="form-group"> <label>Nombre de places occupées&nbsp;</label> </div>
                        <input type="number" class="form-control form-control-lg" placeholder="0"> </form>
                      <div class="form-group"> <label>Nombre de PC&nbsp;</label> </div>
                      <input type="number" class="form-control form-control-lg" placeholder="0">
                      <div class="form-group"> <label>Logiciels installés&nbsp;</label> </div>
                      <input type="text" class="form-control form-control-lg"> </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-12">
    <button type="submit" class="btn mt-2 m-2 text-primary border border-secondary w-100 btn-outline-light">Enregistrer</button>
    <button class="btn mt-2 m-2 btn-outline-primary w-100">Imprimer</button>
  </div>

@endsection