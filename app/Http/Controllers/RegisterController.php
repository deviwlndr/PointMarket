<?php

namespace App\Http\Controllers;

use App\Models\LevelMahasiswa;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('authentication.register', [
            'title' => 'Register',
            'active' => 'register'
        ]);
        
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required',
            'npm' => 'required|min:9|max:9',
            'email' => 'required|unique:users',
            'password' => 'required|min:6|max:255',
        ]);
        
        $validateData['password'] = Hash::make($validateData['password']);
        $user = User::create($validateData);
       
        
        //$request->session()->flash('success', 'Resgistration was successful! Lest Login!');
        return redirect('/login')->with('success', 'Resgistration was successful! Lest Login!');
    }
}
