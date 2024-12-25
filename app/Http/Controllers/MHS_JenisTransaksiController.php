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
            'file_bukti' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048',
            'id_jenis_transaksi' => $request->input('id_jenis_transaksi'),
        ]);

        // Proses data
        $data = $request->all();
        $data['status'] = 'pending'; // Set status awal

        if ($request->hasFile('file_bukti')) {
            $path = $request->file('file_bukti')->store('bukti_misi', 'public'); // Path otomatis dibuat
            $data['file_bukti'] = $path; // Simpan path ke dalam array data
        }
        

        RiwayatPembelianJenisTransaksi::create($data);
        
        return redirect('/level_mahasiswa')->with('success', 'Misi berhasil diajukan dan menunggu validasi admin.');
    }

    public function validasiMisi($id)
    {
    // Cari misi berdasarkan ID
    $misi = RiwayatPembelianJenisTransaksi::findOrFail($id);

    // Ubah status menjadi completed
    $misi->status = 'completed';
    $misi->save();

    return redirect()->back()->with('success', 'Misi berhasil divalidasi.');
    }


}
