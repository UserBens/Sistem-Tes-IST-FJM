<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function indexLogin()
    {
        return view('login.index');
    }

    // public function loginProcess(Request $request)
    // {
    //     $request->validate([
    //         'email' => 'required|email',
    //         'password' => 'required'
    //     ]);

    //     // Request ke API
    //     $response = Http::withHeaders([
    //         'X-API-KEY' => 'fjm_secure_72b81e9d4a5c30f4a123f8c0e7b921',
    //         'Accept' => 'application/json',
    //     ])->post('https://fokusjasamitra.com/api/user/login.php', [
    //         'email' => $request->email,
    //         'password' => $request->password,
    //     ]);

    //     $data = $response->json();

    //     // Jika login berhasil dari API
    //     if (isset($data['status']) && $data['status'] == 'success') {

    //         // Simpan data user ke session dengan key yang benar
    //         Session::put('user', $data['user_data'] ?? []);
    //         Session::put('is_login', true);
    //         Session::put('api_user_id', $data['user_data']['id'] ?? null);

    //         return redirect()->route('participant.create');
    //     }

    //     // Jika login gagal
    //     return back()
    //         ->withInput($request->only('email'))
    //         ->with('error', $data['message'] ?? 'Login gagal');
    // }

    public function loginProcess(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // =============================
        // CEK LOGIN ADMIN LOKAL
        // =============================

        $admin = User::where('email', $request->email)->first();

        if ($admin && Hash::check($request->password, $admin->password)) {

            Session::put('admin', $admin);
            Session::put('is_admin', true);
            Session::put('is_login', true);

            return redirect()->route('dashboard');
        }

        // =============================
        // LOGIN VIA API
        // =============================

        $response = Http::withHeaders([
            'X-API-KEY' => 'fjm_secure_72b81e9d4a5c30f4a123f8c0e7b921',
            'Accept' => 'application/json',
        ])->post('https://fokusjasamitra.com/api/user/login.php', [
            'email' => $request->email,
            'password' => $request->password,
        ]);

        $data = $response->json();

        if (isset($data['status']) && $data['status'] == 'success') {

            Session::put('user', $data['user_data'] ?? []);
            Session::put('is_login', true);
            Session::put('api_user_id', $data['user_data']['id'] ?? null);

            return redirect()->route('participant.create');
        }

        return back()
            ->withInput($request->only('email'))
            ->with('error', 'Email atau password salah');
    }

    // public function logout(Request $request)
    // {
    //     Auth::logout();

    //     $request->session()->forget('participant_id');

    //     $request->session()->invalidate();
    //     $request->session()->regenerateToken();

    //     return redirect()->route('index.login');
    // }

    public function logout(Request $request)
    {
        $request->session()->forget([
            'participant_id',
            'admin',
            'user',
            'api_user_id',
            'is_login',
            'is_admin'
        ]);

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('index.login');
    }

    public function testApi()
    {
        // Data yang ingin dikirim ke API
        $data = [
            'email' => 'benedictusradyan@gmail.com',
            'password' => 'Radyandwi05',
        ];

        // Memanggil API eksternal dengan POST
        $response = Http::withHeaders([
            'X-API-KEY' => 'fjm_secure_72b81e9d4a5c30f4a123f8c0e7b921',
            'Accept' => 'application/json',
        ])->post('https://fokusjasamitra.com/api/user/login.php', $data);

        // // Mengecek apakah request berhasil
        // if ($response->successful()) {
        // Mengambil data dari response JSON
        $responseData = $response->json();
        return view('login.index', ['data' => $responseData]);
        // } else {
        //     // Jika gagal, bisa tampilkan pesan error
        //     return view('login.index', ['data' => ['error' => 'Gagal memanggil API']]);
        // }
    }
}
