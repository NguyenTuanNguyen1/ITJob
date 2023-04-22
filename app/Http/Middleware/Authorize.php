<?php

namespace App\Http\Middleware;

use App\Constant;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Authorize
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::check();

        if ($user && Auth::user()->role_id() == Constant::ROLE_CANDIDATE)
        {
            abort(404);
        }
        elseif ($user && Auth::user()->role_id() == Constant::ROLE_COMPANY)
        {
            abort(404);
        }
        elseif (!Auth::check())
        {
            abort(404);
        }
        return $next($request);
    }
}
