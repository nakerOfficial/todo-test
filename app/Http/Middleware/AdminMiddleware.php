<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth()->user()->cant('writer editor')) {
            throw new AccessDeniedHttpException('Access Denied for route '.Route::currentRouteName(), null, 403);
        }

        return $next($request);
    }
}
