<?php

namespace App\Http\Middleware;

use App\Models\VirtualNumbers;
use Closure;

class UserVirtualNumber
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
        if(VirtualNumbers::where('general_doctors_id' ,auth()->user()->id)->where('status' , 4)->exists()){
            return $next($request);
        }
        alert()->error('کاربر گرامی اول باید حداقل یک شماره مجازی بخرید.', 'درخواست ناموفق')->persistent('باشه');
        return redirect(route('doctor.virtualNumber.index'));
    }
}
