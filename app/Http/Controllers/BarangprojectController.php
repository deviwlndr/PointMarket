<?php

namespace App\Http\Controllers;

use App\Models\Barangproject;
use Illuminate\Http\Request;

class BarangprojectController extends Controller
{
    // Controller
    public function project()
    {
        $barangproject = Barangproject::all();
        return view('barangproject.project', compact('barangproject'));
    }


    public function create()
    {
        return view('barangproject.create');
    }

    public function store(Request $request)
    {
        // Validasi input dengan regex untuk menolak tag HTML berbahaya
        $request->validate([
            'kode_barang' => 'required|string|max:50',
            'dosen' => 'required|string|max:100',
            'nama_barang' => 'required|string|max:255|regex:/^[^<>{}]*$/',  // No tags or special characters
            'deskripsi' => 'nullable|string|max:500|regex:/^[^<>{}]*$/', // Same regex here
            'harga_point' => 'required|integer|min:0',
        ], [
            'nama_barang.regex' => 'Nama barang tidak boleh mengandung karakter HTML atau simbol berbahaya.',
            'deskripsi.regex' => 'Deskripsi tidak boleh mengandung karakter HTML atau simbol berbahaya.',
        ]);
    
        // Sanitasi input untuk menghapus tag HTML (strip_tags)
        $sanitized_nama_barang = strip_tags($request->nama_barang);
        $sanitized_deskripsi = strip_tags($request->deskripsi);
    
        // Simpan data ke database
        Barangproject::create([
            'kode_barang' => $request->kode_barang,
            'dosen' => $request->dosen,
            'nama_barang' => $sanitized_nama_barang,
            'deskripsi' => $sanitized_deskripsi,
            'harga_point' => $request->harga_point,
        ]);
    
        return redirect('/barangproject')->with('success', 'Data Barang Project Berhasil Ditambahkan.');
    }
    


    public function edit($id)
    {
        $barangproject = Barangproject::where('id_barang', $id)->firstOrFail();




        return view('barangproject.edit', compact(['barangproject']));
    }


    public function update(Request $request, $id)
    {
        // Cari data berdasarkan ID dan pastikan hanya satu hasil yang diambil
        $barangproject = Barangproject::where('id_barang', $id)->firstOrFail();

        // Validasi input
         // Validasi input dengan regex untuk menolak tag HTML berbahaya
         $request->validate([
            'kode_barang' => 'required|string|max:50',
            'dosen' => 'required|string|max:100',
            'nama_barang' => 'required|string|max:255|regex:/^[^<>{}]*$/',  // No tags or special characters
            'deskripsi' => 'nullable|string|max:500|regex:/^[^<>{}]*$/', // Same regex here
            'harga_point' => 'required|integer|min:0',
        ], [
            'nama_barang.regex' => 'Nama barang tidak boleh mengandung karakter HTML atau simbol berbahaya.',
            'deskripsi.regex' => 'Deskripsi tidak boleh mengandung karakter HTML atau simbol berbahaya.',
        ]);

        // Sanitasi input untuk menghapus tag HTML
        $sanitized_kode_barang = strip_tags($request->kode_barang);
        $sanitized_dosen = strip_tags($request->dosen);
        $sanitized_nama_barang = strip_tags($request->nama_barang);
        $sanitized_deskripsi = strip_tags($request->deskripsi);
        $sanitized_harga_point = strip_tags($request->harga_point); // Meskipun harga_point berupa angka, bisa jadi input berbahaya
        // Pastikan harga_point masih valid sebagai integer
        $sanitized_harga_point = filter_var($sanitized_harga_point, FILTER_VALIDATE_INT);

        // Pastikan harga_point valid
        if ($sanitized_harga_point === false) {
            return back()->withErrors(['harga_point' => 'Harga point tidak valid.']);
        }

        // Update data
        $barangproject->update([
            'kode_barang' => $sanitized_kode_barang,
            'dosen' => $sanitized_dosen,
            'nama_barang' => $sanitized_nama_barang,
            'deskripsi' => $sanitized_deskripsi,
            'harga_point' => $sanitized_harga_point,
        ]);

        return redirect('/barangproject')->with('success', 'Data Barang Project Berhasil Diubah.');
    }

    public function destroy($id)
    {
        $barangproject = Barangproject::find($id);
        $barangproject->delete();
        return redirect('/barangproject')->with('danger', 'Data Barang Project Berhasil Dihapus!');
    }
}
