<?php

namespace App\Http\Middleware;

use Closure;

class SentinelAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (user()) {
            if (roles() == 'super-administrator') {
                return $next($request);
            }
        } else {
            return redirect()->route('auth.login');
        }
        
        return back();
    }
}
