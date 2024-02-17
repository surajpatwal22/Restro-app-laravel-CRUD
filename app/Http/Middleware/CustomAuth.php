<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CustomAuth
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
        $path = $request->path();
        
        if ($path == 'signup') {
            return $next($request);
        }
        if ($path == 'login' && $request->session()->has('loggedin')) {
            return redirect('/');
        } elseif (($path != 'login' && $path != 'register') && !$request->session()->has('loggedin')) {
            return redirect('login')->with('status', "");
        }
       
        return $next($request);
    }
}
