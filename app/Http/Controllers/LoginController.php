<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('authentication.login', [
            'title' => 'Login',
            'active' => 'login',
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'npm' => 'required|min:9|max:9',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Authentication passed
            return redirect('/dashboard')->with('success', 'Login was successful!');
        }

        // Authentication failed
        return back('/login')->with('loginError', 'Login failed!');
    }
}
