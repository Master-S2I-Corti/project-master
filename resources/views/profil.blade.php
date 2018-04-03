@extends('layouts.app')

@section('content')

    <div id="dimGest" class="w-75 m-auto py-5">
        <div class="d-flex justify-content-between mb-5">
            <h2>{{$myProfil->identity->nom }} {{$myProfil->identity->prenom }}</h2><br>
            
        </div>
        <div class="row">
            <div class="col-md-3">
                <i class="fa fa-user"  style="font-size:200px;"></i>
            </div>
            <div class="col-md-6">
                    <h3><b><u>Mes Informations Personnels</u></b></h3>
                    <h5> Mail Univ : {{ $myProfil->identity->email }} </h5>
                    <h5> Mail Perso :  {{ $myProfil->identity->email_sos }} </h5>
                    <h5> Telephone : {{$myProfil->identity->tel }} </h5>
                    <h5> Adresse : {{ $myProfil->identity->adresse }}, {{$myProfil->identity->code_postal }} {{ $myProfil->identity->ville }} </h5>
                    <h5> Date de naissance : {{ $myProfil->identity->naissance }}</h5>
                    @if($myProfil->identity->isEtudiant())
                    <h5>INE : default </h5>
                    @endif
                    </br>
            </div>
            <div class="col-md-2">
                <p>
                    <button class="add btn btn-primary" data-toggle="modal" data-target="#modifi" >Modifier le profil<i class="ml-2 d-inline fa fa-plus fa-lg"></i></button>
                <br/><br/>
                    <span class="modifier"><button class="add btn btn-primary" data-toggle="modal" data-target="#exampleModal" >Changer de mot de passe<i class="ml-2 d-inline fa fa-plus fa-lg"></i></button></span>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                @if($myProfil->identity->isEtudiant())
                    <h5><b><u>Diplômes étudiés :</u></b></h5>
                    <h5>{{$myProfil->annee[0]->libelle."  ".$myProfil->annee[0]->diplome->libelle }}</h5>
                @endif
                @if($myProfil->identity->isEnseignant())
                    <h5><b><u>Votre Bureau :</u></b></h5>
                    <h5> département : {{ $myProfil->departement[0]->libelle }} </h5>
                    <h5> Batiment : {{ $myProfil->batiment }} </h5>
                    <h5> Etage : {{ $myProfil->etage }} </h5>
                @endif  
            </div>
            <div class="col-4">
                @if($myProfil->identity->isEtudiant())
                    <h5><b><u>Diplômes obtenus : </u></b></h5>
                @endif
                @if($myProfil->identity->isEnseignant())
                    <h5><b><u>Informations : </u></b></h5>
                    <h5> Type enseignant : {{ $myProfil->type }} </h5>
                    <h5> Heures totales : {{ $myProfil->heure }} </h5>
                @endif
            </div>
            <div class="col-4">
                @if($myProfil->identity->isEnseignant())
                    <h5><b><u>Vos Responsabiliés : </u></b></h5>
                @endif
            </div>
        </div>
 
       <!-- POPUP DE MODIFICATON MOT DE PASSE -->
    <div  class="modal fade" aria-labelledby="exampleModalLabel" id="exampleModal">
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
                        <form method="post" action="#" accept-charset="UTF-8">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col">
                                    <p>Nouveau mot de passe: <input type="password" name="psw"/> </p>
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
</div>  

 <!-- POPUP DE MODIFICATON DU PROFIL -->
 <div  class="modal fade" aria-labelledby="modifi" id="modifi">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="nom">Modification de votre profil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <div class="container">
                        <form method="post" action="{!! url('updateProfil') !!}" accept-charset="UTF-8">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-4">
                                    <p>Adresse : <input class="form-control form-control-sm" type="text" name="adresse" value="{{ $myProfil->identity->adresse }}" required/> </p>
                                    <p>code postal: <input class="form-control form-control-sm" type="text" name="code_postal" value="{{ $myProfil->identity->code_postal }}" required/> </p>
                                    <p>ville : <input class="form-control form-control-sm" type="text" name="ville" value="{{ $myProfil->identity->ville }}" required/> </p>
                                </div>
                                <div class="col-md-1">
                                </div>
                                <div class="col-md-4">
                                    <p>Mail Perso : <input class="form-control form-control-sm" type="text" name="email_sos" value="{{ $myProfil->identity->email_sos }}"required/> </p>
                                    <p>Telephone : <input class="form-control form-control-sm" type="text" name="tel" value="{{ $myProfil->identity->tel }}"required/> </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    @if($myProfil->identity->isEnseignant())
                                    <p>Département :
                                        <select class="form-control form-control-sm" name="departement">
                                        @if ( isset($listeDepartement))
                                            @foreach ( $listeDepartement as $departement)
                                                    <option value="{{$departement->id_departement}}">{{$departement->libelle}}</option>
                                            @endforeach
                                        @endif
                                        </select> 
                                    </p> 
                                    <p>Batiment : <input class="form-control form-control-sm" type="text" name="batiment" value="{{  $myProfil->batiment }}"/> </p>
                                    <p>Etage : <input class="form-control form-control-sm" type="text" name="etage" value="{{  $myProfil->etage }}"/> </p>
                                    @endif
                                </div>
                                <div class="col-md-1">
                                </div>
                                <div class="col-md-4">
                                    
                                </div>
                            </div>
                                <div class="modal-footer">
                                    <button class="btn btn-primary"> Modifier</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                </div>
                        </form>
                    </div>
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
                if ($myProfil->identity->isEnseignant())
                {
                    document.querySelector("#fil2").value = $myProfil->id_departement
                }
                $( "#modif" ).modal( "show" );
            });
    </script>
@endsection