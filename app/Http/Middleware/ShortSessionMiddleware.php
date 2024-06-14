<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class ShortSessionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && !$request->session()->has('remember_me')) {
            $expiresAt = now()->addMinutes(1);
            $request->session()->put('expires_at', $expiresAt);
        }

        if ($request->session()->has('expires_at') && now()->greaterThan($request->session()->get('expires_at'))) {
            Auth::logout();
            Session::flush();
            return redirect('/login')->with('error', 'Sesi anda sudah habis, silahkan login ulang');
        }

        return $next($request);
    }
}
