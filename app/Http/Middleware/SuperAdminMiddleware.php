<?php

namespace App\Http\Middleware;

use Closure;

class SuperAdminMiddleware
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
        if (Auth::guest() || $request->user()->userable_type != 'App\Admin' || $request->user()->userable_id != 1)
            return redirect('home');
        return $next($request);
    }
}
