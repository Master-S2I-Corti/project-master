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
                    @if (session('error'))
                        <div class="alert alert-danger">
                        {{ session('error') }}
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success">
                        {{ session('success') }}
                        </div>
                    @else
                    <form class="form-horizontal" method="POST" action="{{ route('changePassword') }}">
                        {{ csrf_field() }}
                                                               
                        <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
                                <label for="new-password" class="control-label">Mot de passe actuel</label>
                                           
                                <input id="current-password" type="password" name="current-password">
                                
                                @if ($errors->has('current-password'))
                                    <span class="help-block text-danger">
                                        <strong>{{ $errors->first('current-password') }}</strong>
                                    </span>
                                @endif
                                @if (session('current-password'))
                                    <span class="help-block text-danger">
                                        <strong>{{ session('current-password') }}</strong>
                                    </span>
                                @endif

                        </div>

                        <div class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">
                            <label for="new-password" class="control-label">Nouveau mot de passe</label>

                                <input id="new-password" type="password" name="new-password">
                                <meter max="5" id="password-strength-meter"></meter>  
                                <span id="notepassword"></span>
                                
                                @if ($errors->has('new-password'))
                                    <span class="help-block text-danger" id="error-msg">
                                        <strong>{{ $errors->first('new-password') }}</strong>
                                    </span>
                                @endif
                                @if (session('new-password'))
                                    <span class="help-block text-danger" id="error-msg">
                                        <strong>{{ session('new-password') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group{{ $errors->has('new-password-confirm') ? ' has-error' : '' }}">
                                <label for="new-password-confirm" class="control-label">Confirmation nouveau mot de passe</label>
                                <input id="new-password-confirm" type="password" name="new-password-confirm">
                                <meter max="5" id="passwordconfirm-strength-meter"></meter>
                                <span id="notepasswordconfirm"></span>
                                    
                                @if ($errors->has('new-password-confirm'))
                                    <span class="help-block text-danger" id="error-msgconfirm">
                                        <strong>{{ $errors->first('new-password-confirm') }}</strong>
                                    </span>
                                @endif
                                @if (session('new-password-confirm'))
                                    <span class="help-block text-danger" id="error-msgconfirm" >
                                        <strong>{{ session('new-password-confirm') }}</strong>
                                    </span>
                                @endif
                        </div>
                        <div class="modal-footer">
                            <br>
                            <button type="submit" id="envoi" class="btn btn-secondary">Valider</button>
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





                        
