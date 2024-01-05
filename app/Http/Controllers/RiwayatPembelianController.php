<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RiwayatPembelian;

class RiwayatPembelianController extends Controller
{
    public function index()
    {
        $riwayat_pembelians = RiwayatPembelian::all();

        return view('riwayat_pembelian_misi.index', compact('riwayat_pembelians'));
    }
    public function index_mahasiswa_misi()
    {
        $riwayat_pembelians = RiwayatPembelian::all();

        return view('riwayat_pembelian_misi.index_mahasiswa', compact('riwayat_pembelians'));
    }
    public function create()
    {
        return view('riwayat_pembelian_misi.create');
    }
    public function store(Request $request)
    {
    // Validasi form jika diperlukan
        $validatedData = $request->validate([
            'npm' => 'required',
            'kode_pembelian' => 'required',
            'nama_pembelian' => 'required',
            'tanggal_pembelian' => 'required',
            
        ]);

        // Simpan data ke dalam tabel riwayat_pembelian
        RiwayatPembelian::create($validatedData);

        // Redirect ke halaman formulir dengan pesan sukses atau ke halaman lain
        return redirect('/riwayat_pembelian_misi')->with('success', 'Transaksi berhasil disimpan');
    } 

}
