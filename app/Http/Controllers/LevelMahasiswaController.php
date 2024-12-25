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
        $riwayat_pembelian_jeniss = RiwayatPembelianJenisTransaksi::all();
        $riwayat_pembelians = RiwayatPembelianJenisTransaksi::all();
        $riwayat_pembelian_barangs= RiwayatPembelianJenisTransaksi::all();
        $rekap_pembelian = $riwayat_pembelian_jeniss->groupBy('npm');

        return view('dashboardmahasiswa.level_mahasiswa', compact('mahasiswas', 'riwayat_pembelian_jeniss', 'rekap_pembelian','riwayat_pembelians', 'riwayat_pembelian_barangs'));
    
    }

}