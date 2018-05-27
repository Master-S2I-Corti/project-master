<nav class="navbar navbar-expand-sm flex-nowrap justify-content-between bg-dark navbar-dark shadow" >
    @auth()
        <button class="toggleMenu btn background-none btn-lg text-white"><i class="fa fa-bars fa-lg "></i> </button>
    @endauth
    <a class="navbar-brand" href="{{URL::to("/")}}"><img class="logo img-fluid" src="{{asset("img/logo.png")}}">Università di Corsica</a>
    <div class="navbar-collapse" id="navbarNav">
    <!-- Links -->
    <ul class="navbar-nav flex-row" >

        @guest
            @if(substr(Request::url(), strrpos(Request::url(), '/') + 1)  != "login")
            <li class="nav-item">
                <a class="nav-link p-0 align-items-center d-inline-flex"  href="{{ url('login')}}">Connexion <i class="icon_account fa fa-user-circle fa-2x"></i></a>
            </li>
            @endif
        @else
            <li class="nav-item ml-3" id="connexion">

                <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-user-circle d-inline align-middle mr-2"></i> Compte
                </button>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="{{url("/profil")}}">Profil</a>
                    <a class="dropdown-item" href="#">Contact</a>
                    <a class="dropdown-item" href="{{ url('changePassword')}}">Changer mot de passe</a>
                    
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">
                        <form id="logout-form" action="{{url("/logout")}}" method="POST" class="hide">
                            {{ csrf_field() }}
                            <button type="submit" class="btn background-none"><i class="icon_left fas fa-sign-out-alt d-inline"></i> @Lang("Déconnexion")</button>
                        </form>
                    </a>
                </div>
            </div>
            </li>

        @endguest
    </ul>
    </div>
</nav>