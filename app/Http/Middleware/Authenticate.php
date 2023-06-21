<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class Authenticate 
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function handle(Request $request, Closure $next)
    {
        $isAuthenticated= (Auth::check());

        //This will be excecuted if the new authentication fails.
        if (!$isAuthenticated){

            return redirect()->route('login')->with('error', 'Please Login First');
        }
        return $next($request);

    }
}
