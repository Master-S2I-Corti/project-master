@extends('layouts.app')

@section('content')

  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-3"> </div>
        <div class="col-md-6">
          <div class="card text-white p-5 bg-dark">
            <div class="card-body">
              <h1 class="mb-4">Réinitialisation</h1>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}

                        
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <div>
                                <label for="login-input" class="form-control-label"><i class="fa fa-envelope d-inline fa-lg"></i>Email</label>
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="exemple@univ-corse.fr" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <br>
                        
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

