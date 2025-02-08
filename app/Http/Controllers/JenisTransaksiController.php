<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisTransaksi;

class JenisTransaksiController extends Controller
{
    public function index()
    {
        $jenistransaksis = JenisTransaksi::all();
        return view('jenistransaksi.index', compact('jenistransaksis'));
    }

    public function create()
    {
        return view('jenistransaksi.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'kode_transaksi' => 'required|string|max:50|unique:jenis_transaksis,kode_transaksi',
            'nama_transaksi' => 'required|string|max:255',
            'deskripsi' => 'nullable|string|max:500',
            'point' => 'required|integer|min:0',
        ]);

        // Simpan data ke database
        JenisTransaksi::create([
            'kode_transaksi' => $request->kode_transaksi,
            'nama_transaksi' => $request->nama_transaksi,
            'deskripsi' => $request->deskripsi,
            'point' => $request->point,
        ]);

        // Redirect dengan pesan sukses
        return redirect('/jenistransaksi')->with('success', 'Data Jenis Transaksi Berhasil Ditambahkan.');
    }


    public function edit($id)
    {
        $jenistransaksi = JenisTransaksi::where('id_jenis_transaksi', $id)->first();
        return view('/jenistransaksi.edit', compact(['jenistransaksi']));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama_transaksi' => 'required|string|max:255',
            'deskripsi' => 'nullable|string|max:500',
            'point' => 'required|integer|min:0',
        ]);

        // Cari data berdasarkan ID
        $jenistransaksi = JenisTransaksi::where('id_jenis_transaksi', $id)->firstOrFail();

        // Update data
        $jenistransaksi->update([
            'nama_transaksi' => $request->nama_transaksi,
            'deskripsi' => $request->deskripsi,
            'point' => $request->point,
        ]);

        // Redirect dengan pesan sukses
        return redirect('/jenistransaksi')->with('success', 'Data Jenis Transaksi Berhasil Diubah.');
    }

    public function destroy($id)
    {
        $jenistransaksi = JenisTransaksi::find($id);
        $jenistransaksi->delete();
        return redirect('/jenistransaksi')->with('danger', 'Data Jenis Transaksi Berhasil Dihapus.');
    }
}
