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


    public function create(){
        return view('barangproject.create');
    }

    public function store(Request $request)
    {
        //dd($request->except(['_token','submit']));
       //Barangproject::create($request->except(['_token','submit']));
       //return redirect('/barangproject');
       $request->validate([
        'kode_barang' => 'required',
        'nama_barang' => 'required',
        'deskripsi' => 'required',
        'harga_point' => 'required|numeric|min:0',
        // Tambahkan aturan validasi lainnya sesuai kebutuhan
    ]);

    Barangproject::create([
        'kode_barang' => $request->kode_barang,
        'nama_barang' => $request->nama_barang,
        'deskripsi' => $request->deskripsi,
        'harga_point' => $request->harga_point,
    ]);
       return redirect('/barangproject')->with('success', 'Data Barang Project Berhasil Ditambahkan.');
    }

    public function edit($id)
    {
        $barangproject = Barangproject::where('id_barang', $id)->first();
        return view('barangproject.edit',compact(['barangproject']));
    }

    public function update(Request $request, $id) 
    {
        $barangproject = Barangproject::where('id_barang', $id)->firstOrFail();
       $barangproject-> update ([
            'kode_barang'=> $request->kode_barang,
            'nama_barang'=> $request->nama_barang,
            'deskripsi'=> $request->deskripsi,
            'harga_point'=> $request->harga_point,
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