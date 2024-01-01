<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;

class AuthCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */

    public function handle(Request $request, Closure $next)
    {
        // MAKE SURE THE MIDDLEWARE IS REGISTERED IN Kernel.php
        // FOR AVOIDING TO ACESS DASHBOARD WHEN WE ARE NotLoggedIn
            if(!Session()->has('loginId')){

            return redirect('/login')->with('error', 'You need to login first.');
        }
        return $next($request);
    }

}
