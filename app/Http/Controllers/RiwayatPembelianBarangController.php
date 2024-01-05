<?php

namespace App\Http\Controllers;

use App\Models\Barangproject;
use App\Models\RiwayatPembelianBarang;
use Illuminate\Http\Request;

class RiwayatPembelianBarangController extends Controller
{
    public function index()
    {
        $riwayat_pembelian_barangs = RiwayatPembelianBarang::all();

        return view('riwayat_pembelian_barang.index', compact('riwayat_pembelian_barangs'));
    }
    public function index_mahasiswa_barang()
    {
        $riwayat_pembelian_barangs = RiwayatPembelianBarang::all();

        return view('riwayat_pembelian_barang.index_mahasiswa', compact('riwayat_pembelian_barangs'));
    }
    public function create()
    {
        return view('riwayat_pembelian_barang.create');
    }
    public function store(Request $request)
    {
    // Validasi form jika diperlukan
        $validatedData = $request->validate([
            'npm' => 'required',
            'kode_pembelian' => 'required',
            'nama_barang' => 'required',
            'deskripsi' => 'required',
            'tanggap_pembelian' => 'required',
            
        ]);

        // Simpan data ke dalam tabel riwayat_pembelian
        RiwayatPembelianBarang::create($validatedData);

        // Redirect ke halaman formulir dengan pesan sukses atau ke halaman lain
        return redirect('/riwayat_pembelian_barang')->with('success', 'Transaksi berhasil disimpan');
    } 
}
