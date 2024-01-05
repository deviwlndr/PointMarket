<?php

namespace App\Http\Controllers;

use App\Models\User;
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
    $credentials = $request->validate([
        'npm' => 'required|min:9|max:9',
        'password' => 'required',
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        // Authentication passed
        return redirect()->intended('/dashboard')->with('success', 'Login was successful!');
    }

        // Authentication failed
        return back()->with('loginError', 'Login failed!')->withInput($request->only('npm'));
    }

}
