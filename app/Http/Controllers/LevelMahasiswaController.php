<?php

namespace App\Http\Controllers;

use App\Models\LevelMahasiswa;
use App\Models\User;
use App\Models\Mahasiswa;
use App\Models\RiwayatPembelianJenisTransaksi;
use Illuminate\Http\Request;

class LevelMahasiswaController extends Controller
{
    public function user()
    {
        $mahasiswas = Mahasiswa::all();

        return view('dashboardmahasiswa.level_mahasiswa', compact('mahasiswas'));
    
    }

}