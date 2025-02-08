<?php

namespace App\Http\Controllers;

use App\Models\MisiTambahan;
use Illuminate\Http\Request;

class MisitambahanController extends Controller
{
    public function index()
    {
        $misitambahans = MisiTambahan::all();
        return view('misitambahan.index', compact('misitambahans'));
    }

    public function create()
    {
        return view('misitambahan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_misi' => 'required|string|max:255',
            'nama_misi' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga_point' => 'required|integer',
        ]);

        MisiTambahan::create([
            'kode_misi' => $request->kode_misi,
            'nama_misi' => $request->nama_misi,
            'deskripsi' => $request->deskripsi,
            'harga_point' => $request->harga_point,
            'dosen' => $request->dosen, // Otomatis mendapatkan nama dosen
        ]);

        return redirect('/misitambahan')->with('success', 'Misi berhasil ditambahkan.');
    }


    public function edit($id)
    {
        // Ambil data berdasarkan ID dengan firstOrFail untuk menangani ID yang tidak ditemukan
        $misitambahan = MisiTambahan::where('id_misi', $id)->firstOrFail();
    
        return view('misitambahan.edit', compact('misitambahan'));
    }
    
    public function update(Request $request, $id)
    {
        // Pastikan data yang diupdate ada di database
        $misi_tambahan = MisiTambahan::where('id_misi', $id)->firstOrFail();
    
        // Validasi input
        $request->validate([
            'kode_misi' => 'required|string|max:50|unique:misi_tambahan,kode_misi,' . $misi_tambahan->id_misi . ',id_misi',
            'nama_misi' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'harga_point' => 'required|integer|min:0',
        ]);
    
        // Update data
        $misi_tambahan->update([
            'kode_misi' => $request->kode_misi,
            'nama_misi' => $request->nama_misi,
            'deskripsi' => $request->deskripsi,
            'harga_point' => $request->harga_point,
        ]);
        
        // Redirect dengan pesan sukses
        return redirect('/misitambahan')->with('success', 'Data Misi Tambahan Berhasil Diubah.');
    }
    

    public function destroy($id)
    {
        $misi_tambahan = MisiTambahan::find($id);
        $misi_tambahan->delete();
        return redirect('/misitambahan')->with('danger', 'Data Misi Tambahan Berhasil Dihapus.');
    }
}
