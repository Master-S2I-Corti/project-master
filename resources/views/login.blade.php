@extends('layouts.app')

@section('content')   
  <div class="px-2">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2 class="text-secondary" contenteditable="true">Identification</h2>
        </div>
      </div>
    </div>
  </div>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-3"> </div>
        <div class="col-md-6">
          <div class="card text-white p-5 bg-primary">
            <div class="card-body">
              <h1 class="mb-4">Authentification</h1>
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
                            <div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Se souvenir de moi
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div>
                                <button type="submit" class="btn btn-secondary">Se connecter</button>
                                <br>
                                <br>
                                <ahref="{{ route('password.request') }}">
                                    Mot de passe oublié ?
                                </a>
                            </div>
                        </div>
                    </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
 @endsection
