<?php

namespace App\Http\Middleware\Admin;

use Closure;
use Illuminate\Http\Request;

class UserMiddleware
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
        if (session('user')==null)
        {
            return redirect()->route('user-login')->with('failure','Please Login First');
        }else{
            return $next($request);
        }
    }
}
