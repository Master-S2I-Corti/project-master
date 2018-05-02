@extends('layouts.app')

@section('content')

    <div id="dimGest" class="w-75 m-auto py-5">
        <div class="d-flex justify-content-between mb-5">
            <h2>{{$myProfil->nom }} {{$myProfil->prenom }}</h2><br>
        </div>
        @if(session()->has("ok"))
                <div class="alert alert-success alert-dismissible">
                        {!! session('ok') !!}
                </div>
            @elseif (session()->has("error"))
                <div class="alert alert-danger alert-dismissible">
                        {!! session('error') !!}
                </div>
            @endif
        <div class="row">
            <div class="col-md-3">
                <i class="fa fa-user"  style="font-size:200px;"></i>
            </div>
            <div class="col-md-6">
                    <h3><b><u>Mes Informations Personnels</u></b></h3>
                    <h5> Mail Univ : {{ $myProfil->email }} </h5>
                    <h5> Mail Perso :  {{ $myProfil->email_sos }} </h5>
                    <h5> Telephone : {{$myProfil->tel }} </h5>
                    <h5> Adresse : {{ $myProfil->adresse }}, {{$myProfil->code_postal }} {{ $myProfil->ville }} </h5>
                    @if( !($myProfil->isAdmin()))
                        <h5> Date de naissance : {{ $myProfil->naissance }}</h5>
                    @endif
                    </br>
            </div>
            <div class="col-md-2">
                <p>
                    <button class="add btn btn-primary" data-toggle="modal" data-target="#modifi" >Modifier le profil<i class="ml-2 d-inline fa fa-plus fa-lg"></i></button>
                </p>
                @if($myProfil->isEnseignant())
                    <p>
                        <button class="add btn btn-primary" data-toggle="modal" data-target="#ajoutIndispo" >Ajout de l'indisponibilité<i class="ml-2 d-inline fa fa-plus fa-lg"></i></button>
                    </p>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                @if($myProfil->isEtudiant())
                    <h5><b><u>Diplômes étudiés :</u></b></h5>
                    <h5>{{$myProfil->Etudiant->annee[0]->diplome->niveau."  ".$myProfil->Etudiant->annee[0]->libelle[0]."  ".$myProfil->Etudiant->annee[0]->diplome->libelle }}</h5>
                @endif 
                @if($myProfil->isEnseignant())
                    <h5><b><u>Vos Responsabiliés : </u></b></h5>
                    @for ($i = 1; $i<= sizeof($myProfil->Enseignant->Est_Responsable);$i++ )
                        <h5>- {{$myProfil->Enseignant->Est_Responsable[$i-1]->Responsabilite->libellle }} </h5>
                        @if($myProfil->Enseignant->Est_Responsable[$i-1]->Responsabilite->libellle == "Responsable de Filiere")
                            <ul>
                            @for ($j = 1; $j<= sizeof($myProfil->Enseignant->Responsable_diplome);$j++ )
                                <li>{{$myProfil->Enseignant->Responsable_diplome[$j-1]->diplome->niveau."  ".$myProfil->Enseignant->Responsable_diplome[$j-1]->diplome->libelle }} </li>
                            @endfor
                            </ul>
                        @endif
                    @endfor
                @endif
            </div>
            <div class="col-4">
                @if($myProfil->isEtudiant())
                    <h5><b><u>Diplômes obtenus : </u></b></h5>
                    @for ($i = 1; $i<= sizeof($myProfil->Etudiant->Est_Diplome);$i++ )
                      <h5>{{$myProfil->Etudiant->Est_Diplome[$i-1]->annee->diplome->niveau."  ".$myProfil->Etudiant->Est_Diplome[$i-1]->annee->libelle[0]."  ".$myProfil->Etudiant->Est_Diplome[$i-1]->annee->diplome->libelle." (".$myProfil->Etudiant->Est_Diplome[$i-1]->obtention.")" }}</h5>
                    @endfor
                @endif
                @if($myProfil->isEnseignant())
                    <h5><b><u>Informations : </u></b></h5>
                    <h5> Type enseignant : {{ $myProfil->Enseignant->Status->type }} </h5>
                    <h5> Heures totales : {{ $myProfil->Enseignant->Status->volumeHoraire }} </h5>
                    <h5> Heures Effectuer : {{ $myProfil->Enseignant->heure }} </h5>
                @endif
            </div>
            <div class="col-4">
                @if($myProfil->isEnseignant())
                    <h5><b><u>Votre Bureau :</u></b></h5>
                    <h5> Département : {{ $myProfil->Enseignant->departement->libelle }} </h5>
                    <h5> UFR : {{ $myProfil->Enseignant->departement->Ufr->libelle }} </h5>
                    <h5> Batiment : {{ $myProfil->Enseignant->batiment }} </h5>
                    <h5> Etage : {{ $myProfil->Enseignant->etage }} </h5>
                @endif 
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                @if($myProfil->isEnseignant())
                    <h5><b><u>Vos indisponibilités :</u></b></h5>
                    @if($myProfil->Enseignant->Indisponibilite != null )
                            <ul>
                            @for ($j = 1; $j<= sizeof($myProfil->Enseignant->Indisponibilite);$j++ )
                                <li>{{$myProfil->Enseignant->Indisponibilite[$j-1]->debut }} au {{$myProfil->Enseignant->Indisponibilite[$j-1]->fin }} </li>
                            @endfor
                            </ul>
                    @endif
                @endif 
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
                        <form method="post" action="{!! url('profil/updateProfil') !!}" accept-charset="UTF-8">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-4">
                                    <p>Adresse : <input class="form-control form-control-sm" type="text" name="adresse" value="{{ $myProfil->adresse }}" required/> </p>
                                    <p>code postal: <input class="form-control form-control-sm" type="number" name="code_postal" value="{{ $myProfil->code_postal }}" required/> </p>
                                    <p>ville : <input class="form-control form-control-sm" type="text" name="ville" value="{{ $myProfil->ville }}" required/> </p>
                                </div>
                                <div class="col-md-1">
                                </div>
                                <div class="col-md-4">
                                    <p>Mail Perso : <input class="form-control form-control-sm" type="text" name="email_sos" value="{{ $myProfil->email_sos }}"required/> </p>
                                    <p>Telephone : <input class="form-control form-control-sm" type="tel" name="tel" value="{{ $myProfil->tel }}" required pattern="[0-9]{2} [0-9]{2} [0-9]{2} [0-9]{2} [0-9]{2}"/> </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    @if($myProfil->isEnseignant())
                                    <p>Département :
                                        <select class="form-control form-control-sm" name="departement">
                                        @if ( isset($listeDepartement))
                                            @foreach ( $listeDepartement as $departement)
                                                    <option value="{{$departement->id_departement}}">{{$departement->libelle}}</option>
                                            @endforeach
                                        @endif
                                        </select> 
                                    </p> 
                                    <p>Batiment : <input class="form-control form-control-sm" type="text" name="batiment" value="{{  $myProfil->Enseignant->batiment }}"/> </p>
                                    <p>Etage : <input class="form-control form-control-sm" type="number" name="etage" value="{{  $myProfil->Enseignant->etage }}"/> </p>
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

<!-- POPUP D'Ajout de 'indisponibilité' -->
<div id="ajoutIndispo" class="modal fade">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="nom">Ajout de l'indisponibilité</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        <div class="container">
                            
                            <div class="row">
                                <div class="col">
                                    <form method="post" action="{{ url('profil/ajoutIndisponible') }}">
                                        {{ csrf_field() }}
                                        <div class="row">
                                            <div class="col-md-5">
                                                <label> 
                                                Début : 
                                                <input type="date" name="dateDebut" required>
                                                <input type="time" name="timeDebut" required>
                                            </label>
                                            </div>
                                            <div class="col-md-1">
                                            </div>
                                            <div class="col-md-5">
                                               <label> 
                                                Fin : 
                                                <input type="date" name="dateFin" required>
                                                <input type="time" name="timeFin" required>
                                            </label> 
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-primary">Enregistrer</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                        </div>
                                    </form>
                                </div>
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
                $( "#modif" ).modal( "show" );
            });
        });

        $( function() {
            $( ".ajoutIndisponible" ).on( "click", function(e) {
                $( "#ajoutIndispo" ).modal( "show" );
            });
        });
    </script>
@endsection