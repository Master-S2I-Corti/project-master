@if(substr(Request::url(), strrpos(Request::url(), '/') + 1)  == "register")
@else
<div class="modal fade" id="connexionModal" tabindex="-1" role="dialog" aria-labelledby="connexionModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><strong>Authentification</strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-horizontal" method="POST" action="{{ url('login') }}">

            <div class="modal-body">
                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('identifiant') ? ' has-error' : '' }}">
                        <div>
                            <label for="login-input" class="form-control-label"><i class="material-icons">perm_identity</i>Identifiant</label>
                            <input id="login-input" type="text" placeholder="Identifiant" class="form-control" name="identifiant"
                                   value="{{ old('identifiant') }}" required autofocus>
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <div>
                            <label for="password-input" class="form-control-label"><i class="material-icons">lock_outline</i>Mot de passe</label>
                            <input id="password-input" type="password" class="form-control" placeholder="Mot de passe" name="password"
                                   required>
                            @if ($errors->has('identifiant'))
                                <span class="help-block text-danger">
                                        <strong>{{ $errors->first('identifiant') }}</strong>
                                    </span>
                            @endif

                            @if ($errors->has('password'))
                                <span class="help-block text-danger">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                <button type="submit" class="btn btn-primary">Valider</button>
            </div>
            </form>

        </div>
    </div>
</div>
@endif
