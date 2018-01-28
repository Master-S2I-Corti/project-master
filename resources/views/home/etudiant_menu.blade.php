<h6 class="p-3">Etudiant</h6>



<a class="d-flex align-items-center p-3 selected" href="{{ URL::to('/edt') }}">
    <i class="fa fa-clock-o" ></i>
    <p>Emploi du temps</p>
</a>


<a class="d-flex align-items-center p-3" href="{{ URL::to('/notes') }}">
    <i class="fa fa-pencil" ></i>
    <p>Notes</p>
</a>



<a class="d-flex align-items-center p-3" href="{{ URL::to('/annuaire/professeurs') }}">
    <i class="fa fa-address-card" ></i>
    <p>Annuaire professeurs</p>
</a>

<a class="d-flex align-items-center p-3" href="{{ URL::to('/annuaire/etudiants') }}">
    <i class="fa fa-graduation-cap" ></i>
    <p>Annuaire étudiants</p>
</a>
