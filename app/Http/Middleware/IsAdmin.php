<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (! $request->user()){
            abort(403, 'Access denied');
        }
        if (! $request->user()->isAdmin()) {
            abort(403, 'Access denied');
        }
        return $next($request);
    }
}
