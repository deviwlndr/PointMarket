<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.login', [
            'title' => 'Login',
            'active' => 'login',
        ]);
    }

    public function login(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'role' => 'required|in:student,admin,dosen',
            'login' => 'required|string',
            'password' => 'required|string',
        ]);

        // Cek apakah login menggunakan npm atau email
        $fieldType = filter_var($request->login, FILTER_VALIDATE_EMAIL) ? 'email' : 'npm';

        // Tentukan role dan metode login
        if ($request->role === 'student' && $fieldType === 'npm') {
            $credentials = ['npm' => $request->login, 'password' => $request->password];
        } elseif ($request->role !== 'student' && $fieldType === 'email') {
            $credentials = ['email' => $request->login, 'password' => $request->password, 'role' => $request->role];
        } else {
            return back()->with('loginError', 'Format login tidak sesuai dengan peran yang dipilih.');
        }

        // Proses login
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Redirect berdasarkan role
            return match ($request->role) {
                'student' => redirect()->route('profile')->with('success', 'Login berhasil sebagai mahasiswa.'),
                'admin' => redirect()->route('admin.dashboard')->with('success', 'Login berhasil sebagai admin.'),
                'dosen' => redirect()->route('dosen.profile')->with('success', 'Login berhasil sebagai dosen.'),
                default => redirect()->route('home'),
            };
        }

        return back()->with('loginError', 'Kredensial tidak valid, silakan coba lagi.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Anda telah logout.');
    }
}
