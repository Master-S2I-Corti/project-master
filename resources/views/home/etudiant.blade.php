<h2 class="w-100 border-bottom pb-3" style="border-bottom: 1px solid #c2c2c2">Fonctionnalités étudiantes</h2>


<a class="col-md-4" href="{{ URL::to('/etudiant/edt') }}">
    <div class="row my-4">
        <div class="col-3 "><i class="fa fa-clock-o fa-4x text-dark" ></i></div>
        <div class="col-6 col-md-10 col-lg-8 ">
            <h4>Emploi du temps</h4>
            <p>Voir votre emploi du temps</p>
        </div>
    </div>
</a>

<a class="col-md-4" href="{{ URL::to('/notes') }}">
    <div class="row my-4">
        <div class="col-3"><i class="fa fa-pencil fa-4x text-dark" ></i></div>
        <div class="col-6 col-md-10 col-lg-8 ">
            <h4>Notes</h4>
            <p>Voir vos notes</p>
        </div>
    </div>
</a>


<a class="col-md-4" href="{{ URL::to('/annuaire/professeurs') }}">
    <div class="row my-4">
        <div class="col-3"><img src="{{ asset('img/prof.svg') }}"/></div>
        <div class="col-6 col-md-10 col-lg-8">
            <h4>Liste des professeurs</h4>
            <p>Voir toute la liste</p>
        </div>
    </div>
</a>

<a class="col-md-4" href="{{ URL::to('/annuaire/etudiants') }}">
    <div class="row my-4">
        <div class="col-3"><img src="{{ asset('img/etu.svg') }}"/></div>
        <div class="col-6 col-md-10 col-lg-8">
            <h4>Liste des étudiants</h4>
            <p>Voir toute la liste</p>
        </div>
    </div>
</a>