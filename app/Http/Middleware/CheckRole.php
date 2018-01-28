<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
{

    public function handle($request, Closure $next, ...$roles)
    {
        $user = Auth::user();

        if(in_array('admin', $roles) && $user->isAdmin()) {
            return $next($request);
        } else if(in_array('enseignant', $roles) && $user->isEnseignant()) {
            return $next($request);
        } else if(in_array('etudiant', $roles) && $user->isEtudiant()) {
            return $next($request);
        }
        return redirect('/');
    }
}
