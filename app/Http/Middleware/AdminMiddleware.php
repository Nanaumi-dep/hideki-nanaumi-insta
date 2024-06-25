<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth; //authentication
use App\models\User; //reqresents the table

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (Auth::check() && Auth::user()->role_id == User::ADMIN_ROLE_ID) {
            /**
             * The Auth::check() -- check if the Auth is logged in or not
             */
            return $next($request);
        }

        return redirect()->route('index');
    }
}
