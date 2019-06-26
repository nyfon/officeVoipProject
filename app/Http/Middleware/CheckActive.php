<?php

namespace App\Http\Middleware;

use App\User;
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
            if(auth()->user()->is_status === User::mergeIsStatus('active')){
                return $next($request);
            }
            return redirect(route('activate.show'));
        }
        return redirect(route('login'));
    }
}
