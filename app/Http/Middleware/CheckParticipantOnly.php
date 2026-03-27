<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckParticipantOnly
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // kalau admin → blok
        if (session()->has('is_admin')) {
            return redirect()->route('dashboard')
                ->with('error', 'Admin tidak boleh mengakses halaman participant.');
        }

        return $next($request);
    }
}
