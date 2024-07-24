<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class NowLogin
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && $request->is('login')){
            return redirect()->route('/');
        }

        return $next($request);
    }
}
