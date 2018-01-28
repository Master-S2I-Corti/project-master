<h2 class="w-100 border-bottom pb-3" style="border-bottom: 1px solid #c2c2c2">Fonctionnalités administrateurs</h2>

<a class="col-md-4" href="{{ URL::to('/gestion/ue') }}">
    <div class="row my-4">
        <div class="col-3"><i class="fa fa-book fa-4x text-dark" ></i></div>
        <div class="col-8">
            <h4>Gestion des UEs</h4>
            <p>Ajout,suppression ou modification des UEs</p>
        </div>
    </div>
</a>

<a class="col-md-4" href="{{ URL::to('/gestion/edt') }}">
    <div class="row my-4">
        <div class="col-3"><i class="fa fa-clock-o fa-4x text-dark" ></i></div>
        <div class="col-8">
            <h4>Gestion de l'emploi du temps</h4>
            <p>Ajout,suppression ou modification de l'emploi du temps</p>
        </div>
    </div>
</a>

<a class="col-md-4" href="{{ URL::to('/gestion/salles') }}">
    <div class="row my-4">
        <div class="col-3"><img src="{{ asset('img/salle.png') }}"/></div>
        <div class="col-8">
            <h4>Gestion des salles</h4>
            <p>Ajout,suppression ou modification des salles</p>
        </div>
    </div>
</a>

<a class="col-md-4" href="{{ URL::to('/gestion/notes') }}">
    <div class="row my-4">
        <div class="col-3"><i class="fa fa-pencil fa-4x text-dark" ></i></div>
        <div class="col-8">
            <h4>Notes</h4>
            <p>Ajout,suppression ou modification des notes </p>
        </div>
    </div>
</a>


<a class="col-md-4 " href="{{ URL::to('/gestion/filiere') }}">
    <div class="row my-4">
        <div class="col-3"><img src="{{ asset('img/filiere.png') }}"/></div>
        <div class="col-8">
            <h4>Gestion des filières</h4>
            <p>Ajout,suppression ou modification des filières</p>
        </div>
    </div>

</a>
<a class="col-md-4" href="{{ URL::to('/gestion/semestres') }}">
    <div class="row my-4">
        <div class="col-3"><i class="fa fa-file fa-4x text-dark" ></i></div>
        <div class="col-8">
            <h4>Gestion des semestres</h4>
            <p>Ajout,suppression ou modification des semestres</p>
        </div>
    </div>
</a>

<a class="col-md-4" href="{{ URL::to('/gestion/annuaire/professeurs') }}">
    <div class="row my-4">
        <div class="col-3"><img src="{{ asset('img/prof.png') }}"/></div>
        <div class="col-8">
            <h4>Liste des professeurs</h4>
            <p>Ajout,suppression ou modification des professeurs</p>
        </div>
    </div>
</a>

<a class="col-md-4" href="{{ URL::to('/gestion/annuaire/etudiants') }}">
    <div class="row my-4">
        <div class="col-3"><img src="{{ asset('img/etu.png') }}"/></div>
        <div class="col-8">
            <h4>Liste des étudiants</h4>
            <p>Ajout,suppression ou modification des étudiants</p>
        </div>
    </div>
</a>