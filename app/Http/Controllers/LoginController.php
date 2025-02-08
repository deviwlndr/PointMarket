<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class LoginController extends Controller
{
    
    public function index()
    {
        return view('authentication.login', [
            'title' => 'Login',
            'active' => 'login',
        ]);
    }

    public function store(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'role' => 'required|in:student,admin,dosen',
            'npm' => 'nullable|required_if:role,student|string|size:9',
            'email' => 'nullable|required_unless:role,student|email',
            'password' => 'required|string',
        ]);

        // Proses login berdasarkan role
        if ($request->role === 'student') {
            // Login untuk mahasiswa menggunakan NPM
            if (Auth::attempt(['npm' => $request->npm, 'password' => $request->password])) {
                // Regenerasi sesi untuk keamanan
                $request->session()->regenerate();
                return redirect()->route('profile')->with('success', 'Login berhasil sebagai mahasiswa.');
            }
        } elseif ($request->role === 'admin') {
            // Login untuk admin menggunakan email dan role
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role' => 'admin'])) {
                $request->session()->regenerate();
                return redirect()->route('admin.dashboard')->with('success', 'Login berhasil sebagai admin.');
            }
        } elseif ($request->role === 'dosen') {
            // Login untuk dosen menggunakan email dan role
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role' => 'dosen'])) {
                $request->session()->regenerate();
                return redirect()->route('dosen.profile')->with('success', 'Login berhasil sebagai dosen.');
            }
        }

        // Jika login gagal
        return back()->with('loginError', 'Kredensial tidak valid, silakan coba lagi.');
    }

    

}

