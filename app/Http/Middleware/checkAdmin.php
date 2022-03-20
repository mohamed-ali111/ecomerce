<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;    //خلي بالك اللينك ده ليه عشان السطر رقم 13 لانها وقفت معانا كتير


use Closure;

class checkAdmin
{
    public function handle($request, Closure $next)
    {
        if(Auth::user() && Auth::user()->role ==="admin"){
            //if authanticated
        return $next($request);

        //نفذ علي طول

        }else{
            return redirect('/login');

            // لو الشرط متتحققش
        }
    }
}
