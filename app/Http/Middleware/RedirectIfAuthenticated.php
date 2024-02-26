<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                switch (auth()->user()->type) {
                    case 1:
                        return redirect('/admin/dashboard');
                    case 2:
                        return redirect('/manager/dashboard');
                    case 3:
                        return redirect('/member/dashboard');
                    case 0:
                        return redirect('/owner/dashboard');
                    default:
                        return redirect('/home');
                }
            }
        }
        return $next($request);
    }
}
