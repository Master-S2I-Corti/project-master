@extends('layouts.app')

@section('content')

    <div id="dimGest" class="w-75 m-auto py-5">
        <div class="d-flex justify-content-between mb-5">
            <h2>{{ $log->nom }} {{ $log->prenom }}</h2><br>
            <p>
            <button class="add btn btn-primary" >Modifier le profil<i class="ml-2 d-inline fa fa-plus fa-lg"></i></button>
            <br/><br/>
            <button class="add btn btn-primary" ><span class="modifier">Changer de mot de passe<i class="ml-2 d-inline fa fa-plus fa-lg"></i></span></button>
            </p>
        </div>
        <div class="row">
            <div class="col-8">
                <!-- this personne-->
                <h4> Mail Univ : default </h4>
                <h4> Mail Perso :  {{ $log->mail }} </h4>
                <h4> Telephone : {{ $log->tel }} </h4>
                <h4> Adresse : {{ $log->adresse }} </h4>
                <h4> Date de naissance : default</h4>
                @if($log->isEtudiant())
                <h4> Filière : default </h4>
                <h4> INE : default </h4>
                @endif
                @if($log->isEnseignant())
                <h4> département : default </h4>  
                <h4> N° Bureau : default </h4>  
                <h4> Type enseignant : default </h4>
                <h4> Responsabilité : default </h4>
                <h4> Heures totales : default </h4>
                @endif
            </div>
            <div class="col-4">
            <img src="{{ asset('img/whot.jpg') }}">
            </div>
        </div>

       <!-- POPUP DE MODIFICATON MOT DE PASSE -->
    <div id="modif"  class="modal fade">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="nom">Modification du mot de passe</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <div class="container">
                        <form method="post" action="{!! url('updateProf') !!}" accept-charset="UTF-8">
                            {{ csrf_field() }}
                            <h1><span id="nom2" name="nom"> P </span> <span id="pre2" name="prenom">P</span></h1>
                            <div class="row">
                                <div class="col">
                                    <input type="libelle"
                                </div>
                                <div class="col">
                                    <p> Professeur pédagogique : </p>
                                    <p> Email: <input type="text" name="mail" id="mail" value=''/><br/></p>
                                    <p> Département: <input type="text" name="departement" id="dep2" value=''/><br/>
                                    </p>
                                    <p> Bureau N°: <input type="text" name="numbur" id="nb" value=''/><br/> </p></div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <button class="btn btn-primary"> Modifier</button>
                                </div>
                            </div>
                        </form>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script>
        $( function() {
            $( ".modifier" ).on( "click", function(e) {
                $( "#modif" ).modal( "show" );
            });
    </script>
@endsection