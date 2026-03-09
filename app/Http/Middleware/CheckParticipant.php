<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckParticipant
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // cek apakah participant sudah ada di session
        if (!session()->has('participant_id')) {

            return redirect()
                ->route('participant.create')
                ->with('error', 'Silahkan isi data diri terlebih dahulu.');
        }

        return $next($request);
    }
}
