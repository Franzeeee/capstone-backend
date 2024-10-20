<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Closure;
use Symfony\Component\HttpFoundation\Response;

class Authenticate extends Middleware
{
    protected function redirectTo($request)
    {
        // Remove or comment out this line
        //return $request->expectsJson() ? null : route('login');
    }

    public function handle($request, Closure $next, ...$guards)
    {
        if ($jwt = $request->cookie('jwt')) {
            $request->headers->set('Authorization', 'Bearer ' . $jwt);
        }
        try {
            $this->authenticate($request, $guards);
        } catch (\Exception $e) {
            // Return JSON response if not authenticated
            return response()->json([
                'status' => 'Unauthenticated',
            ], Response::HTTP_UNAUTHORIZED);
        }

        return $next($request);
    }
}
