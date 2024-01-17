<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        if ($request->expectsJson()){
            return null;
        }else{
            // Ajouter un message de session avant de rediriger
            session()->flash('status', 'Vous devez être connecté pour accéder à cette page.');
            return  route( 'accueil');
        }
    }
}
