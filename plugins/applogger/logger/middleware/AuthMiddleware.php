<?php

namespace AppLogger\Logger\Middleware;

use Closure;
use AppUser\User\Models\User;
use Illuminate\Http\Request;

class AuthMiddleware // REVIEW - Tento middleware sa týka autentifikácie ale máš ho v Logger plugine
{
    public function handle(Request $request, Closure $next)
    {
        $token = $request->header('Authorization');

        $user = User::where('token', $token)->first();

        if (!$user && !$request->is('backend/*')) {
            // REVIEW - Tu by som taktiež hodil radšej exception ako spomínam v AuthServices.php
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        $request->merge(['user_id' => $user->id]);

        return $next($request);
    }
}
