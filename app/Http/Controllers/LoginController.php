<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index', [
            'title' => 'Login',
            'active' => 'login'
        ]);
        
    }

    public function authenticate(Request $request)
    {
      $request->validate([
        'npm' => 'required|min:9|max:9',
        'password' => 'required'
      ]);
      // Coba melakukan autentikasi pengguna
        if (Auth::attempt(['npm' => $request->npm, 'password' => $request->password])) {
        // Autentikasi berhasil
        dd('berhasil login');
        } else {
        // Autentikasi gagal
        dd('gagal login');
        }
        $password = Hash::make($request->password);
    }
}
