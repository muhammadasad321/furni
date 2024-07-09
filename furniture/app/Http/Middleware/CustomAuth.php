<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Session;
use Symfony\Component\HttpFoundation\Response;

class CustomAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $path = $request->path();
        if(($path=="admin/login") && (Session::get('username')))
        {
            return redirect('admin/dashboard');

        }
        elseif(($path!="admin/login") && (!Session::get('username'))){

            return redirect('admin/login');

        }
             
        
        return $next($request);
    }
}
