<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsPassword
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
        if($request->password == 12345){
            return redirect('/')->with("NotApproved","Please wait for Admin approval!");
        }
        return $next($request);
    }
}
