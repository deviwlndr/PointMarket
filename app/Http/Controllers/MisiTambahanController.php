<?php

namespace App\Http\Controllers;

use App\Models\MisiTambahan;
use Illuminate\Http\Request;

class MisitambahanController extends Controller
{
    //
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
       MisiTambahan::create([
        'kode_misi'=> $request->kode_misi,
        'nama_misi'=> $request->nama_misi,
        'deskripsi'=>$request->deskripsi,
        'harga_point'=> $request->harga_point,
       ]);
       return redirect('/misitambahan')->with('success', 'Data Misi Tambahan Berhasil Ditambahkan.');
    }

    public function edit($id)
    {    
       $misitambahan = MisiTambahan::find($id);
        return view('/misitambahan.edit', compact(['misitambahan']));
    }

    public function update(Request $request, $id)
    {
       $misitambahan = MisiTambahan::find($id);
       $misitambahan-> update ([
            'kode_misi'=> $request->kode_misi,
            'nama_misi'=> $request->nama_misi,
            'deskripsi'=> $request->deskripsi,
            'harga_point'=> $request->harga_point,
           ]);
           return redirect('/misitambahan')->with('success', 'Data Misi Tambahan Berhasil Diubah.');
    }

    public function destroy($id)
    {
        $misitambahan = MisiTambahan::find($id);
        $misitambahan->delete();   
        return redirect('/misitambahan')->with('success', 'Data Misi Tambahan Berhasil Dihapus.');
    
    }
}
