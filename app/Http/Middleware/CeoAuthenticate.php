<?php

namespace App\Http\Middleware;

use Closure;

class CeoAuthenticate
{
    public function handle($request, Closure $next, $role)
    {
    	if($request->user()->hasRole($role))
    		return $next($request);
		return redirect('/');
    }
}