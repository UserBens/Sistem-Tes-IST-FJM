<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureSafeExamBrowser
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // 1. Ambil Kunci Konfigurasi Asli dari file .env
        $sebConfigKey = env('SEB_CONFIG_KEY');

        // 2. Ambil URL absolut dari halaman yang sedang diakses saat ini
        $currentUrl = $request->fullUrl();

        // 3. Rumus Rahasia SEB: Satukan URL saat ini dengan Kunci Asli, lalu buat SHA256 Hash
        $expectedHash = hash('sha256', $currentUrl . $sebConfigKey);

        // 4. Ambil Header Hash yang dikirim secara dinamis oleh aplikasi SEB
        $requestConfigKey = $request->header('x-safeexambrowser-configkeyhash');

        // 5. Validasi: Apakah hash buatan Laravel cocok dengan hash kiriman SEB?
        if (!$requestConfigKey || $requestConfigKey !== $expectedHash) {
            abort(403, 'AKSES DITOLAK: Anda wajib menggunakan aplikasi Safe Exam Browser (SEB) dan file konfigurasi resmi untuk mengikuti tes IST ini.');
        }

        // Jika lolos, izinkan akses ke halaman tes
        return $next($request);
    }
}