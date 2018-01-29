
@extends('layouts.app')



@section('content')


    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-10" id="book">
                    <h1 class="pb-3 bg-light">GESTION D'UNE SALLE </h1>
                    <div class="card">
                        <div class="card-body p-5">
                            <form action="https://formspree.io/YOUREMAILHERE">
                                <div class="form-group"> <label>Numéro salle</label>
                                    <input type="number" class="form-control"> </div>
                                <div class="form-group"> <label>Nombre d'heures réservées</label>
                                    <input type="number" class="form-control form-control-lg" placeholder="0"> </div>
                                <div class="form-group"> <label>Choix d'une UE</label> </div>
                                <input type="text" class="form-control"> </form>
                        </div>
                        <button type="submit" class="btn mt-2 btn-outline-danger m-2">Enregistrer</button>
                        <button class="btn mt-2 m-2 btn-outline-primary">Imprimer</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

