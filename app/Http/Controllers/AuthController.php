<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ], [
            'username.required' => 'Username wajib diisi.',
            'password.required' => 'Password wajib diisi.',
        ]);

        if (Auth::attempt([
            'username' => $credentials['username'],
            'password' => $credentials['password'],
        ])) {

            $request->session()->regenerate();

            return redirect()
                ->route('dashboard.index')
                ->with('success', 'Selamat datang di Sistem Informasi SMPN 2 MANGUNREJA.');
        }

        return back()
            ->withErrors([
                'username' => 'Username atau password salah.',
            ])
            ->withInput($request->only('username'));
    }
    
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()
            ->route('login')
            ->with('success', 'Berhasil logout.');
    }
}