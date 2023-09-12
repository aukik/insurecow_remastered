<?php

namespace App\Http\Middleware\Farmer;

use Closure;
use Illuminate\Http\Request;

class CattleRegistrationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse) $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->permission != null) {
            if (auth()->user()->permission->f_cattle_reg) {
                return $next($request);
            } else {
                return response()->view('exceptions.403', [], 404);
//                abort(404);
            }
        } else {
            abort(404);
        }
    }
}
