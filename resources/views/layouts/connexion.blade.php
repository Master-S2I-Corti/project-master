  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-3"> </div>
        <div class="col-xs-12 col-sm-12 col-lg-6">
          <div class="card text-white p-5 bg-dark">
            <div class="card-body">
                <h2 class="mb-4">Authentification</h2>
                
            <form class="form-horizontal" method="POST" action="{{ url('login') }}">

            <div class="modal-body">
                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('login') ? ' has-error' : '' }}">
                        <div>
                            <label for="login-input" class="form-control-label"><i class="fa fa-user d-inline fa-lg"></i>Identifiant</label>
                            <input id="login-input" type="text" placeholder="Identifiant" class="form-control" name="login"
                                   value="{{ old('login') }}" required autofocus>
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <div>
                            <label for="password-input" class="form-control-label"><i class="fa d-inline fa-lock fa-lg"></i>Mot de passe</label>
                            <input id="password-input" type="password" class="form-control" placeholder="Mot de passe" name="password"
                                   required>
                            @if ($errors->has('login'))
                                <span class="help-block text-danger">
                                        <strong>{{ $errors->first('login') }}</strong>
                                    </span>
                            @endif

                            @if ($errors->has('password'))
                                <span class="help-block text-danger">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                
                    <div class="form-group{{ $errors->has('captcha') ? ' has-error' : '' }}">
                            <label for="captcha" class="form-control-label"><i class="fa d-inline fa-cogs"></i>Captcha</label>
                                
                                <div class="captcha">
                                    <span id="cap">{!! captcha_img() !!}</span>
                                    <button type="button" class="btn btn-primary btn-refresh"><i class="fa d-inline fa-refresh"></i></button>
                                </div>
                        <br>
                                <input id="captcha" type="text" class="form-control" name="captcha" placeholder="Code captcha">

                                @if ($errors->has('captcha'))
                                    <span class="help-block text-danger">
                                        <strong>{{ $errors->first('captcha') }}</strong>
                                    </span>
                                @endif
                        
                            
                    </div>
                    <div class="form-group">
                        <a href="{{ route('password.request') }}">
                                    Mot de passe oublié ?
                        </a>
                    </div>


                    
                </div>
                    
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Valider</button>
            </div>
            </form>
                </div>
              </div>
          </div>
         <div class="col-md-3"> </div> 
        </div>
      </div>
    </div>
