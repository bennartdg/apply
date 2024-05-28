<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleLevel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$level)
    {
        if (in_array($request->user()->level, $level)) {
            return $next($request);
        }

        if ($request->user()->level == 1) {
            return redirect('/home');
        }

        return redirect('/dashboard');
    }
}
