<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
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
       Mahasiswa::create([
        'npm'=> $request->npm,
        'nama_mahasiswa'=> $request->nama_mahasiswa,
        'jumlah_point'=> $request->jumlah_point,
       ]);
       return redirect('/mahasiswa')->with('success', 'Data Level Mahasiswa Berhasil Ditambahkan.');
    }

    public function edit($id)
    {    
       $mahasiswa = Mahasiswa::find($id);
        return view('/mahasiswa.edit', compact(['mahasiswa']));
    }

    public function update(Request $request, $id)
    {
       $mahasiswa = Mahasiswa::find($id);
       $mahasiswa-> update ([
            'npm'=> $request->npm,
            'nama_mahasiswa'=> $request->nama_mahasiswa,
            'jumlah_point'=> $request->jumlah_point,
           ]);
           return redirect('/mahasiswa')->with('success', 'Data Level Mahasiswa Berhasil Diubah.');
    }

    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->delete();   
        return redirect('/mahasiswa')->with('success', 'Data Level Mahasiswa Berhasil Dihapus.');
    
    }
}
