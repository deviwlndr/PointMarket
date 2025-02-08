<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        return view('layouts.master');
    }

    public function profile()
    {
        // Ambil data dosen yang sedang login
        $admin = Auth::user();

        // Pastikan role-nya adalah dosen
        if ($admin->role !== 'admin') {
            abort(403, 'Unauthorized action.');
        }

        return view('layouts.profile', compact('admin'));
    }

}
