<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;

class RedirectIfAdminAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //If request comes from logged in user, he will
        //be redirect to home page.
        if (Auth::guard()->check()) {
            return redirect('/admin_home');
        }
        
        //If request comes from logged in seller, he will
        //be redirected to seller's home page.
        if (Auth::guard('admin')->check()) {
            return redirect('/admin_home');
        }
        return $next($request);
    }
}
