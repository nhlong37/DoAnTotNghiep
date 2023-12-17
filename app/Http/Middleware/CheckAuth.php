<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        if ($role == 'admin') {
            if(auth()->guard('admin')->check()){
                if (auth()->guard('admin')->user()->id_role == null || auth()->guard('admin')->user()->id_role == 1) {
                    return $next($request);
                } else {
                    return redirect('/login-admin');
                }
            }
            else{
                return redirect('/login-admin');
            }
        } elseif ($role == 'user') {
            if(auth()->guard('user')->check()){
                if (auth()->guard('user')->user()->id_role == 2 ) {
                    return $next($request);
                } else {
                    return redirect('/login-user');
                }
            }
            else{
                return redirect('/login-user');
            }
        } else {
            return redirect('/login');
        }
    }
}
