<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Constants\RoleConstant;
use Illuminate\Support\Facades\Auth;

class IndustryAndInvestorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::user() && isset(Auth::user()->role->name) && (Auth::user()->role->name == RoleConstant::INDUSTRY || Auth::user()->role->name == RoleConstant::INVESTOR))
        {
            return $next($request);
        }
        return response()->json([
            'message' => 'Unauthorized industry/investor',
            'status' => false
        ],401);
    }
}
