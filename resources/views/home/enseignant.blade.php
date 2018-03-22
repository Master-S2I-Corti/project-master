<h2 class="w-100 border-bottom pb-3" style="border-bottom: 1px solid #c2c2c2">Fonctionnalités enseignantes</h2>

<a class="col-md-4" href="{{ URL::to('/ue') }}">
    <div class="row my-4">
        <div class="col-3"><i class="fa fa-book fa-4x text-dark" ></i></div>
        <div class="col-8">
            <h4>UEs</h4>
            <p>Voir vos UEs pris en charges</p>
        </div>
    </div>
</a>

<a class="col-md-4" href="{{ URL::to('/enseignant/edt') }}">
    <div class="row my-4">
        <div class="col-3"><i class="fa fa-clock-o fa-4x text-dark" ></i></div>
        <div class="col-8">
            <h4>Emploi du temps</h4>
            <p>Voir votre emploi du temps</p>
        </div>
    </div>
</a>


<a class="col-md-4" href="{{ URL::to('/gestion/notes') }}">
    <div class="row my-4">
        <div class="col-3"><i class="fa fa-pencil fa-4x text-dark" ></i></div>
        <div class="col-8">
            <h4>Notes</h4>
            <p>Ajout,suppression ou modification des notes des éléves pris en charge</p>
        </div>
    </div>
</a>

<a class="col-md-4" href="{{ URL::to('/salles') }}">
    <div class="row my-4">
        <div class="col-3"><img src="{{ asset('img/salle.svg') }}"/></div>
        <div class="col-8">
            <h4>Liste des salles</h4>
            <p>Voir toutes les salles</p>
        </div>
    </div>
</a>

<a class="col-md-4" href="{{ URL::to('/annuaire/professeurs') }}">
    <div class="row my-4">
        <div class="col-3"><img src="{{ asset('img/prof.svg') }}"/></div>
        <div class="col-8">
            <h4>Liste des professeurs</h4>
            <p>Voir toute la liste</p>
        </div>
    </div>
</a>

<a class="col-md-4" href="{{ URL::to('/annuaire/etudiants') }}">
    <div class="row my-4">
        <div class="col-3"><img src="{{ asset('img/etu.svg') }}"/></div>
        <div class="col-8">
            <h4>Liste des étudiants</h4>
            <p>Voir toute la liste</p>
        </div>
    </div>
</a>
