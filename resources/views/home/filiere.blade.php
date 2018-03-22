<h2 class="w-100 border-bottom pb-3" style="border-bottom: 1px solid #c2c2c2">Fonctionnalités responsable de filière</h2>


<a class="col-md-4" href="{{ URL::to('/') }}">
    <div class="row my-5">
        <div class="col-3"><i class="fa fa-book fa-4x text-dark" ></i></div>
        <div class="col-8">
            <h4>Gestion des UEs</h4>
            <p>Ajout,suppression ou modification des UEs</p>
        </div>
    </div>
</a>


<a class="col-md-4" href="{{ URL::to('/') }}">
    <div class="row my-5">
        <div class="col-3"><img src="{{ asset('img/png/clock-8x.png') }}"/></div>
        <div class="col-8">
            <h4>Gestion de l'emploi du temps</h4>
            <p>Ajout,suppression ou modification de l'emploi du temps</p>
        </div>
    </div>
</a>

<a class="col-md-4" href="{{ URL::to('/') }}">
    <div class="row my-5">
        <div class="col-3"><img src="{{ asset('img/salle.png') }}"/></div>
        <div class="col-8">
            <h4>Liste des salles</h4>
            <p>Voir toutes les salles</p>
        </div>
    </div>
</a>

<a class="col-md-4" href="{{ URL::to('/') }}">
    <div class="row my-5">
        <div class="col-3"><img src="{{ asset('img/png/pencil-8x.png') }}"/></div>
        <div class="col-8">
            <h4>Notes</h4>
            <p>Ajout,suppression ou modification des notes des éléves pris en charge</p>
        </div>
    </div>
</a>
<a class="col-md-4" href="{{ URL::to('/') }}">
    <div class="row my-5">
        <div class="col-3"><img src="{{ asset('img/filiere.png') }}"/></div>
        <div class="col-8">
            <h4>Gestion des filières</h4>
            <p>Ajout,suppression ou modification des filières</p>
        </div>
    </div>
</a>

<a class="col-md-4" href="{{ URL::to('/') }}">
    <div class="row my-5">
        <div class="col-3"><img src="{{ asset('img/png/file-8x.png') }}"/></div>
        <div class="col-8">
            <h4>Gestion des semestres</h4>
            <p>Ajout,suppression ou modification des semestres</p>
        </div>
    </div>
</a>

<a class="col-md-4 " href="{{ URL::to('listeProf/chef') }}">
    <div class="row my-5">
        <div class="col-3"><img src="{{ asset('img/prof.png') }}"/></div>
        <div class="col-8">
            <h4>Liste des professeurs</h4>
            <p>Voir toute la liste</p>
        </div>
    </div>
</a>

<a class="col-md-4" href="{{ URL::to('listeEtudiant/chef') }}">
    <div class="row my-5">
        <div class="col-3"><img src="{{ asset('img/etu.png') }}"/></div>
        <div class="col-8">
            <h4>Liste des étudiants</h4>
            <p>Ajout,suppression ou modification des étudiants</p>
        </div>
    </div>
</a>