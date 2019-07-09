<?php

namespace App\Http\Middleware;

use Closure;

class CheckAdminUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        
        if(!auth()->check()) return redirect('login');

        if(! isset(\auth()->user()->type) && in_array(\auth()->user()->type, [
            \App\User::SUPERADMIN,
            \App\User::ADMIN

        ])) {
            auth()->logout();
            return redirect('login');
        }
        return $next($request);
    }
}
