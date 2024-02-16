<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisTransaksi;
use App\Models\RiwayatPembelianJenisTransaksi;

class MHS_JenisTransaksiController extends Controller
{
    public function index()
    {
        $jenistransaksis = JenisTransaksi::all();
        return view('dashboardmahasiswa.mhs_jenistransaksi', compact('jenistransaksis'));
    }

    public function index_mahasiswa_jenis()
    {
        $riwayat_pembelian_jeniss = RiwayatPembelianJenisTransaksi::all();
        $rekap_pembelian = $riwayat_pembelian_jeniss->groupBy('npm');

        return view('riwayat_pembelian_jenis_transaksi.index_mahasiswa', compact('riwayat_pembelian_jeniss', 'rekap_pembelian'));
    }

    public function create()
    {
        return view('riwayat_pembelian_jenis_transaksi.create');
    }

    public function store(Request $request)
    {
        RiwayatPembelianJenisTransaksi::create([
            'id_transaksi' => $request->input('id_transaksi'),
            'npm' => $request->npm,
            'transaksi' => $request->transaksi,
            'point' => $request->point,
            'tanggal_transaksi' => $request->tanggal_transaksi,
            'id_jenis_transaksi' => $request->input('id_jenis_transaksi'),
        ]);
        
        return redirect('/level_mahasiswa')->with('success', 'Transaksi berhasil disimpan');
    }
}
