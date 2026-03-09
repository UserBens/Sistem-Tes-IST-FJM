<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-red-50 to-orange-100 p-6">
        <div class="max-w-md w-full">
            <div class="bg-white rounded-xl shadow-2xl p-8 text-center">
                
                <!-- Error Icon -->
                <div class="flex items-center justify-center w-16 h-16 bg-red-100 rounded-full mx-auto mb-6">
                    <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 9v2m0 4v2m0 0v2m0-6v-2m0-4v-2m0 2a2 2 0 100-4 2 2 0 000 4z" />
                    </svg>
                </div>

                <!-- Error Title -->
                <h1 class="text-2xl font-bold text-gray-900 mb-2">
                    Sesi Tes Tidak Valid
                </h1>

                <!-- Error Message -->
                <p class="text-gray-600 mb-6 leading-relaxed">
                    Akses ke tes ini tidak diizinkan. Kemungkinan penyebab:
                </p>

                <!-- Error Reasons -->
                <div class="bg-red-50 rounded-lg p-4 mb-6 text-left">
                    <ul class="text-sm text-gray-700 space-y-2">
                        <li class="flex items-start gap-2">
                            <span class="text-red-500 font-bold flex-shrink-0">•</span>
                            <span>Sesi tes telah berakhir</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-red-500 font-bold flex-shrink-0">•</span>
                            <span>Token sesi tidak valid atau telah dihapus</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-red-500 font-bold flex-shrink-0">•</span>
                            <span>Anda mencoba mengakses test dari device/IP yang berbeda</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-red-500 font-bold flex-shrink-0">•</span>
                            <span>Sesi browser telah kadaluarsa</span>
                        </li>
                    </ul>
                </div>

                <!-- Action Button -->
                <a href="{{ route('index.login') }}"
                    class="inline-block w-full bg-indigo-600 text-white font-semibold py-3 rounded-lg
                    hover:bg-indigo-700 transition duration-200">
                    Kembali ke Login
                </a>

                <!-- Support Text -->
                <p class="text-xs text-gray-500 mt-4">
                    Jika Anda merasa ini adalah kesalahan, hubungi admin atau coba login kembali.
                </p>
            </div>
        </div>
    </div>