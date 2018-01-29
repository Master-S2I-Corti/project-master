@extends('layouts.app')



@section('content')


    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-10" id="book">
                    <h1 class="pb-3 bg-light" contenteditable="true">CREER UNE SALLE</h1>
                    <div class="card">
                        <div class="card-body p-5">
                            <form action="https://formspree.io/YOUREMAILHERE">
                                <div class="form-group"> <label>Numéro Salle</label>
                                    <input type="number" class="form-control"> </div>
                                <div class="form-group"> <label>Nombre de places occupées</label>
                                    <input type="number" class="form-control"> </div>
                                <div class="form-group"> <label>Nombre de PC</label>
                                    <input type="number" class="form-control"> </div>
                                <div class="form-group"> <label>Logiciels PC</label>
                                    <input type="text" class="form-control form-control-lg" placeholder=""> </div>
                                <button type="submit" class="btn mt-2 btn-outline-danger m-2">Enregistrer</button>
                                <button type="reset" class="btn mt-2 m-2 btn-outline-primary">Annuler</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

