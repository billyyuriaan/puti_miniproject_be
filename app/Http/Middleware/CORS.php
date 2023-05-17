<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CORS
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $request->header("Access-Control-Allow-Origin" , "*");
        $request->header("Access-Control-Allow-Methods" , "POST, GET, OPTIONS, PUT, DELETE");

        return $next($request);
    }
}
