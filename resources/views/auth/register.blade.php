@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center">
            <div class="panel panel-default" style="margin-top:50px">
                <div class="panel-heading" style="margin-bottom: 20px"><h1>Inscription</h1></div>

                <div class="panel-body" style="width: 500px">
                    <form class="form-horizontal" method="POST" action="{{ url('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('identifiant') ? ' has-error' : '' }}">
                            <div >
                                <label for="login-input" class="form-control-label"><i class="fa fa-user d-inline fa-lg"></i>Identifiant</label>
                                <input id="login-input" type="text" class="form-control" name="identifiant" value="{{ old('identifiant') }}" required>

                                @if ($errors->has('identifiant'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('identifiant') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                            <div >
                                <label for="password-input" class="form-control-label"><i class="fa fa-lock d-inline fa-lg"></i>Mot de passe</label>
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="form-control-label"><i class="fa fa-lock d-inline fa-lg"></i>Confirmer mot de passe</label>
                            <div>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="captcha" class="form-control-label">Captcha</label>
                            <div>
                                {!! Recaptcha::render()!!}
                                
                                @if ($errors->has('g-recaptcha-response'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group d-flex justify-content-end">
                            <div class="col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Valider
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
</div>
@endsection
