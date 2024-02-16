<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\RiwayatPembelian;
use App\Models\RiwayatPembelianBarang;
use App\Models\RiwayatPembelianJenisTransaksi;
use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    
    public function search_admin(Request $request)
    {
    $searchTerm = $request->input('npm');
        $users = User::all();
        $mahasiswas = Mahasiswa::all();
        $searchResults = Mahasiswa::where('npm', 'like', '%' . $searchTerm . '%')->get();
        $riwayat_pembelian_jeniss = RiwayatPembelianJenisTransaksi::all();
        
        $rekap_pembelian = $riwayat_pembelian_jeniss->groupBy('npm');
        return view('search.index', compact('searchResults', 'users', 'mahasiswas',  'riwayat_pembelian_jeniss', 'rekap_pembelian'));
        
    }

    public function search_mhs(Request $request)
    {
    $searchTerm = $request->input('npm');
        $users = User::all();
        $mahasiswas = Mahasiswa::all();
        $searchResults = Mahasiswa::where('npm', 'like', '%' . $searchTerm . '%')->get();
        $riwayat_pembelian_jeniss = RiwayatPembelianJenisTransaksi::all();
        
        $rekap_pembelian = $riwayat_pembelian_jeniss->groupBy('npm');
        return view('search.index_mahasiswa', compact('searchResults', 'users', 'mahasiswas',  'riwayat_pembelian_jeniss', 'rekap_pembelian'));
        
    }

}
