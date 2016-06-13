<?php

namespace App\Http\Middleware;

use Closure;

class RoleAuthenticate
{
    public function handle($request, Closure $next, $role)
    {
    	if($request->user()->hasRole('Ceo'))
    		return $next($request);

    	if (!$request->user()->hasRole($role)) {
            return redirect('/');
        }

		return $next($request);
    }
}