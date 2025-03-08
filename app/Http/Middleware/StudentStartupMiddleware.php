<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Constants\RoleConstant;
use Illuminate\Support\Facades\Auth;

class StudentStartupMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::user() && isset(Auth::user()->role->name) && (Auth::user()->role->name == RoleConstant::STUDENT || Auth::user()->role->name == RoleConstant::STARTUP))
        {
            return $next($request);
        }
        return response()->json([
            'message' => 'Unauthorized student/startup',
            'status' => false
        ],401);
    }
}
