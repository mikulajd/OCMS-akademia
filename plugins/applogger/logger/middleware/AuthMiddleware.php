<?php

namespace AppLogger\Logger\Middleware;

use Closure;
use AppUser\User\Models\User;
use Illuminate\Http\Request;

class AuthMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $token = $request->header('Authorization');

        $user = User::where('token', $token)->first();

        if (!$user && !$request->is('backend/*')) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        $request->merge(['user_id' => $user->id]);

        return $next($request);
    }
}
