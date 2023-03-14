<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsManagerLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if($request->session()->has('online_manager')) {
            return $next($request);
        }
        else {
            return redirect("m1001m/login")->with("error", "Please Sign In first");
        }
    }
}
