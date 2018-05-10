@extends('layouts.app')

@section('content')

  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-1"> </div>
        <div class="col-md-10">
          <div class="card text-white p-5 bg-dark">
            <div class="card-body">
              <h2 class="mb-4">Modification mot de passe</h2>
                    @if (session('status'))
                        <div class="alert alert-success">
                        {{ session('status') }}
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success">
                        {{ session('success') }}
                        </div>
                    @else
                        
                    <form class="form-horizontal" method="POST" action="{{ route('password.request') }}">
                        {{ csrf_field() }}
                        
                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="login-input" class="form-control-label"><i class="fa fa-envelope d-inline fa-lg"></i>Email</label>
                   
                                <input id="email" type="email" name="email" value="{{ $email or old('email') }}"  placeholder="" >
                                <br><br>
                                @if ($errors->has('email'))
                                    <span class="help-block text-danger">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="control-label"><i class="fa fa-lock d-inline fa-lg"></i>Mot de passe</label>

                                <input id="password" type="password" name="password" placeholder="">
                                <meter max="5" id="reset-password-strength-meter"></meter>
                                <span id="notermotdepasse"></span>
                                
                                @if ($errors->has('password'))
                                    <span class="help-block text-danger" id="error-msg">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="control-label"><i class="fa fa-lock d-inline fa-lg"></i>Confirmation mot de passe</label>
                                <input id="password_confirmation" type="password" name="password_confirmation" placeholder="">
                                <meter max="5" id="reset-passwordconfirmation-strength-meter"></meter> 
                                <span id="notermotdepasseconfirm"></span>
                            
                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block text-danger" id="error-msgconfirm">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                                @if (session('error'))
                                    <span class="help-block text-danger" id="error-msgconfirm">
                                        <strong>{{ session('error') }}</strong>
                                    </span>
                                @endif
                                
                        </div> 
                        
                        <div class="modal-footer">
                            <br>
                            <button type="submit" class="btn btn-secondary">Valider</button>
                        </div>
                    </form>
                    @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
 @endsection






                        
