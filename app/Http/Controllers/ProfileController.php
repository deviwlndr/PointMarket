<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        // Ambil data pengguna yang sedang login
        $users = Auth::user();
        
        // Kirim data ke view profile
        return view('dashboardmahasiswa.profile', compact('users'));
    }
}
