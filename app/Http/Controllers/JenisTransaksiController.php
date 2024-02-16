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
       JenisTransaksi::create([
        'kode_transaksi'=> $request->kode_transaksi,
        'nama_transaksi'=> $request->nama_transaksi,
        'deskripsi'=> $request->deskripsi,
        'point'=> $request->point,
       ]);
       
       return redirect('/jenistransaksi')->with('success', 'Data Jenis Transaksi Berhasil Ditambahakan.');
    }

    public function edit($id)
    {    
       $jenistransaksi = JenisTransaksi::where('id_jenis_transaksi', $id)->first();
        return view('/jenistransaksi.edit', compact(['jenistransaksi']));
    }

    public function update(Request $request, $id)
    {
       $jenistransaksi = JenisTransaksi::where('id_jenis_transaksi', $id)->firstOrFail();
       $jenistransaksi-> update ([
            'nama_transaksi'=> $request->nama_transaksi,
            'deskripsi'=> $request->deskripsi,
            'point'=> $request->point,
           ]);
           return redirect('/jenistransaksi')->with('success', 'Data Jenis Transaksi Berhasil Diubah.');

    }
    public function destroy($id)
    {
        $jenistransaksi = JenisTransaksi::find($id);
        $jenistransaksi->delete();   
        return redirect('/jenistransaksi')->with('danger', 'Data Jenis Transaksi Berhasil Dihapus.');
    
    }
}
