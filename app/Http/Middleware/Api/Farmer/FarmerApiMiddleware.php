<?php

namespace App\Http\Middleware\Api\Farmer;

use Closure;
use Illuminate\Http\Request;

class FarmerApiMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse) $next
     * @return \Illuminate\Http\JsonResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->role == 'f') {
            return $next($request);
        } else {
            return response()->json([
                'response' => 'unauthorized',
                'status' => 404,
                'message' => 'Not a farmer account credential',
            ], 404);

        }
    }
}
