<?php

namespace App\Http\Controllers;

use App\Models\FormPembelian;
use Illuminate\Http\Request;
use App\Models\RiwayatPembelian;

class FormPembelianController extends Controller
{
    public function index()
    {
        $formpembelians = FormPembelian::all();
        return view('formpembelian.index', compact('formpembelians'));
    }
    public function store(Request $request)
    {
    // Validasi form jika diperlukan
        $validatedData = $request->validate([
            'npm' => 'required',
            'kode_pembelian' => 'required',
            'nama_pembelian' => 'required',
            
        ]);

        // Simpan data ke dalam tabel riwayat_pembelian
        RiwayatPembelian::create($validatedData);

        // Redirect ke halaman formulir dengan pesan sukses atau ke halaman lain
        return redirect('/formpembelian')->with('success', 'Pembelian berhasil disimpan');
    } 

    public function create()
    {
        return view('formpembelian.create');
    }
}
