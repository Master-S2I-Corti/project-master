@extends('layouts.app')

@section('content')

  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-3"> </div>
        <div class="col-md-6">
          <div class="card text-white p-5 bg-dark">
            <div class="card-body">
              <h2 class="mb-4">Modification mot de passe</h2>
                    <form class="form-horizontal" method="POST" action="{{ route('password.request') }}">
                        {{ csrf_field() }}
                        
                    <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="login-input" class="form-control-label"><i class="fa fa-envelope d-inline fa-lg"></i>Email</label>
                   
                                <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}"  placeholder="exemple@univ-corse.fr" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="control-label"><i class="fa fa-lock d-inline fa-lg"></i>Password</label>

                                <input id="password" type="password" class="form-control" name="password" placeholder="********" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="control-label"><i class="fa fa-lock d-inline fa-lg"></i>Confirm                                                       Password</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="********" required>

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                        </div>    

                        
                        <div class="modal-footer">
                            <br>
                            <button type="submit" class="btn btn-secondary">Valider</button>
                        </div>
                    </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
 @endsection






                        
