<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckEnseignant
{

    public function handle($request, Closure $next)
    {
        if(Auth::user()->isEtudiant()) {
            return redirect('/');
        }
        return $next($request);
    }
}
