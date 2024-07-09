<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PreventDirectAccess
{
    public function handle($request, Closure $next)
    {
        if (!$request->isMethod('get') || !$request->has('search')) {
            return redirect('/');
        }

        return $next($request);
    }
}
