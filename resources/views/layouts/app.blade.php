<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="../resources/assets/css/app.css" type="text/css">
    <link rel="stylesheet" href="../resources/assets/css/theme.css" type="text/css">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @yield('css')
</head>
<body>
<nav class="navbar navbar-expand-md bg-primary navbar-dark">
    <div class="container">
      <a class="navbar-brand" href="#"><i class="fa d-inline fa-lg fa-graduation-cap"></i><b>&nbsp;UNIVERSITA DI CORSICA</b></a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar2SupportedContent" aria-controls="navbar2SupportedContent"
        aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
      <div class="collapse navbar-collapse text-center justify-content-end" id="navbar2SupportedContent">
        <ul class="navbar-nav"> &nbsp; &nbsp; &nbsp;
          @guest
                <li class="nav-item"><a class="nav-link" data-toggle="modal" data-target="#myModal" href="{{ route('login') }}"  >@lang('Connexion')</a></li>
            @else
                <li class="nav-item">
                    <a id="logout" class="nav-link" href="{{ route('logout') }}">@lang('Déconnexion')</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hide">
                        {{ csrf_field() }}
                    </form>
                </li>
            @endguest
        </ul>&nbsp; &nbsp;
      </div>
    </div>
  </nav>    
    
    
    
<div id ="myModal" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
      <div class="modal-content ">
          <div class="card text-white p-5 bg-primary">
            <div class="modal-body">
                <h4 class="modal-title">AUTHENTIFICATION</h4>
                <br>
            
          <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                            <div>
                                <input id="email" type="email" placeholder="Adresse Email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                            <div>
                                <input id="password" type="password" class="form-control" placeholder="Mot de passe"name="password" required>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                                <ahref="{{ route('password.request') }}">
                                    Mot de passe oublié ?
                                </a>  
                        </div>

                        
                            <button type="submit" class="btn btn-secondary">Se connecter</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        
                </form>    
      </div>
    </div>
          </div>
    </div>
</div>    

    
    
    
    
    
@yield('content')
<script src="{{ asset('js/app.js') }}"></script>
@yield('script')
<script>
    $(function() {
        $('#logout').click(function(e) {
            e.preventDefault();
            $('#logout-form').submit()
        })
    })
</script>
</body>
</html>