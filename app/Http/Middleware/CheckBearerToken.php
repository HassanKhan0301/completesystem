<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;

class CheckBearerToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        // Check if Authorization header exists
        if (!$request->header('Authorization')) {
            return response()->json(['message' => 'Unauthorized Token','status'=>false], 401);
        }

        // Extract the token from the header
        $token = $request->bearerToken();
        $user = User::where('bearer_token',$token)->select('bearer_token')->first();

        // Token is valid, proceed with the request
        if (isset($user) && $token === $user->bearer_token) {
            return $next($request);
        }

        // Perform token validation
        return response()->json(['message' => 'Invalid Token','status'=>false], 401);
    }
}
