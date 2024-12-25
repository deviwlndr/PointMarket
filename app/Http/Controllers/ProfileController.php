<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Monolog\Level;

class ProfileController extends Controller
{
    public function index()
    {
        
        // Ambil data pengguna yang sedang login
        $users = Auth::user();
       // Ambil data mahasiswa melalui relasi
       $mahasiswas = $users->mahasiswa;

       // Kirim data ke view
       return view('dashboardmahasiswa.profile', [
           'user' => $users,
           'mahasiswa' => $mahasiswas,
       ]);
       
    }
}
