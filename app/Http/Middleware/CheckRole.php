<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

Use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ( Auth::user()->role === "admin" ){

            return $next($request);

        }

        else{
            return redirect()->route('home');
        }
     
    }
}
