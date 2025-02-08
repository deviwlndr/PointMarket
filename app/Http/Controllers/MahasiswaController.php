<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\RiwayatPembelianJenisTransaksi;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{

    public function index()
    {
        $mahasiswas = Mahasiswa::all();



        return view('mahasiswa.index', compact('mahasiswas'));
    }


    public function create()
    {
        return view('mahasiswa.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'npm' => 'required|string|max:15|unique:mahasiswas,npm',
            'nama_mahasiswa' => 'required|string|max:255',
            'jumlah_point' => 'required|integer|min:0',
        ]);

        // Simpan data ke database
        Mahasiswa::create([
            'npm' => $request->npm,
            'nama_mahasiswa' => $request->nama_mahasiswa,
            'jumlah_point' => $request->jumlah_point,
        ]);

        // Redirect dengan pesan sukses
        return redirect('/mahasiswa')->with('success', 'Data Level Mahasiswa Berhasil Ditambahkan.');
    }


    public function edit($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        return view('/mahasiswa.edit', compact(['mahasiswa']));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'npm' => 'required|string|max:15|unique:mahasiswa,npm,' . $id, // Sesuaikan dengan ID mahasiswa yang sedang diupdate
            'nama_mahasiswa' => 'required|string|max:255',
            'jumlah_point' => 'required|integer|min:0',
        ]);
        

        // Cari data berdasarkan ID
        $mahasiswa = Mahasiswa::find($id);

        // Update data
        $mahasiswa->update([
            'npm' => $request->npm,
            'nama_mahasiswa' => $request->nama_mahasiswa,
            'jumlah_point' => $request->jumlah_point,
        ]);

        // Redirect dengan pesan sukses
        return redirect('/mahasiswa')->with('success', 'Data Level Mahasiswa Berhasil Diubah.');
    }


    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->delete();
        return redirect('/mahasiswa')->with('success', 'Data Level Mahasiswa Berhasil Dihapus.');
    }
}
