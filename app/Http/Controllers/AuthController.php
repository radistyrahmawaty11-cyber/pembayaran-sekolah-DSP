<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // 1. Menampilkan halaman login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // 2. Memproses data login yang dikirim dari form
    public function login(Request $request)
    {
        // Validasi input (harus ada username & password)
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Coba cek ke database apakah username & password cocok
        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate(); // Cegah pembajakan sesi

            // Cek role user, lalu arahkan ke dashboard masing-masing
            if (Auth::user()->role == 'admin') {
                return redirect()->intended('/admin/dashboard');
            }

            return redirect()->intended('/siswa/dashboard');
        }

        // Jika username/password salah, kembalikan ke halaman login dengan pesan error
        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ])->onlyInput('username');
    }

    // 3. Proses Logout
    public function logout(Request $request)
    {
        Auth::logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}