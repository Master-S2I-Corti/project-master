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
        @guest
            <a class="nav-link padding-0" data-toggle="modal" href="{{ url('login')}}" data-target="#connexionModal"><i class="icon_account material-icons">account_circle</i></a>
        @else
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Compte
                </button>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">
                        <form id="logout-form" action="{{url("/logout")}}" method="POST" class="hide">
                            {{ csrf_field() }}
                            <button type="submit" class="btn background-none"><i class="icon_left material-icons">exit_to_app</i> @Lang("Déconnexion")</button>
                        </form>
                    </a>
                </div>
            </div>

        @endguest

        </li>
    </ul>
    </div>
</nav>