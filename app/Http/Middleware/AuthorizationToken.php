<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthorizationToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if($request->header('authorization_token') !== env('AUTHORIZATION_TOKEN')) {
            return response()->json('Brak autoryzacji');
        } else {
            return $next($request);
        }
    }
}
