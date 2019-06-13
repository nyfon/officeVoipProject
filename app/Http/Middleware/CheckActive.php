<?php

namespace App\Http\Middleware;

use Closure;

class CheckActive
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
        if(auth()->check()){
            if(auth()->user()->isActive === 'active'){
                return $next($request);
            }
            return redirect(route('activate.show'));
        }
        return redirect(route('login'));
    }
}
