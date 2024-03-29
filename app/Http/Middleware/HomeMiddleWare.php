<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class HomeMiddleWare
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
        if(Auth::user())
        {
            if(Auth::user()->role == 'admin'){

                return redirect('/admin');
            }
            else{

                return redirect('/profile/'.Auth::user()->slug);

            }
        }
        return $next($request);
    }
}
