<?php

namespace App\Http\Middleware\Client;

use Closure;
use Illuminate\Http\Request;

class ClientMiddleware
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
        if (session('client')==null)
        {
            return redirect()->route('client-login')->with('failure','Please Login First');
        }else{
            return $next($request);
        }

    }
}
