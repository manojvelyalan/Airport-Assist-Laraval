<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use \App\User;
class Rights
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$role)
    {
        $userRoleIds = json_decode(Auth::user()->department->role);
        if(!in_array($role, $userRoleIds))  
        return abort(404);
        
        return $next($request);
    }
}
