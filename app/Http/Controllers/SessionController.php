<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function index()
    {
        return view("admin.index.login");
    }

    public function loginProses(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email', // Pastikan email valid
            'password' => 'required'
        ], [
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'password.required' => 'Password wajib diisi',
        ]);

        // Informasi login
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];

        // Proses otentikasi
        if (Auth::attempt($data)) {
            // Kalau otentikasi sukses, redirect ke halaman yang dituju
            return redirect()->route('dashboard')->with('success', 'Login berhasil!');
        } else {
            // Kalau otentikasi gagal, kembali ke form login dengan error
            return redirect()->route('login')->withErrors(['login' => 'Email atau password salah']);
        }
    }

    public function logout()
    {
        Auth::logout(); // Logout pengguna
        return redirect()->route('login')->with('success', 'Kamu Berhasil Logout'); // Redirect ke halaman login dengan pesan sukses
    }
}
