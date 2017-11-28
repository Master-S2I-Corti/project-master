<nav class="navbar navbar-expand-sm bg-dark navbar-dark shadow" >
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="{{URL::to("/")}}"><img class="logo img-fluid" src="{{asset("img/logo.png")}}">Università di Corsica</a>
    <div class="collapse navbar-collapse" id="navbarNav">

    <!-- Links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="{{URL::to("/emploi")}}">Emploi du temps</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Note</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Item 3</a>
        </li>
        <li class="nav-item" id="connexion">
            <a class="nav-link" data-toggle="modal" data-target="#connexionModal" href="#"><i class="material-icons">account_circle</i></a>
        </li>

    </ul>
    </div>
</nav>