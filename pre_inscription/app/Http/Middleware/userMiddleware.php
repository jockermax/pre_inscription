<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class userMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check())
        {
            if(Auth::user()->type == 'user')
            {
                return $next($request);
            }
            else
            {

                return redirect()->with('status', 'Accès non autorisé');
            }
        }
        else
        {
            return redirect('/')->with('status','Conectez-vous d\'abord');
        }
    }
}
