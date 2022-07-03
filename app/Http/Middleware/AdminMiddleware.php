<?php

namespace App\Http\Middleware;

use App\Enums\UserRoleEnum;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check())
        {
            if (Auth::user()->role_as == UserRoleEnum::ADMIN->value) // Admin
            {
                return $next($request);
            }

            else if(Auth::user()->role_as == UserRoleEnum::USER->value) //User
            {
                return redirect()->route('get.all.post');
            }
        }

        else
        {
            return redirect()->route('Auth.login');
        }
    }
}
