<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AlreadyLoggedIn
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
        // FOR AVOIDING TO ACESS REGISTRATION AND LOGIN PAGE WHEN WE ARE AlreadyLoggedIN at DASHBOARD
        if(Session()->has('loginId')){

            return redirect('/dashboard');
        }
        return $next($request);
    }
}