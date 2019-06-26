<?php

namespace App\Http\Middleware;

use Closure;

class CheckUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if(auth()->user()->userGroup->name === $role){
            return $next($request);
        }

        auth()->logout();
        alert()->error('شما اجازه دسترسی به این صفحه را ندارید.', 'ورود ناموفق')->persistent('باشه');
        return redirect(route('home'));

    }
}
