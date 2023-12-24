<?php

namespace App\Http\Controllers;

use App\Models\LevelMahasiswa;
use App\Models\User;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class LevelMahasiswaController extends Controller
{
    public function user()
    {
        $users = User::all();
        return view('dashboardmahasiswa.level_mahasiswa', compact('users'));
    }

    
}
