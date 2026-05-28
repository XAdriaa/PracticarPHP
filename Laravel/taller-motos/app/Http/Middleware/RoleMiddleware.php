<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, string $rol): mixed
    {
        if (!auth()->check() || auth()->user()->rol !== $rol) {
            abort(403, 'No tienes permiso para acceder aquí.');
        }

        return $next($request);
    }
}