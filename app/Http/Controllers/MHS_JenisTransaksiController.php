<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisTransaksi;
use App\Models\MHS_MisiTambahan;
use App\Models\MisiTambahan;
use App\Models\RiwayatPembelianJenisTransaksi;
use Illuminate\Support\Facades\Auth;

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

    public function create(Request $request)
{
    $request->validate([
        'id_transaksi' => 'required|string',
        'id_misi' => 'required|integer',
        'tanggal_transaksi' => 'required|date',
        'file_bukti' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048',
        'id_jenis_transaksi' => 'required|integer',
    ]);

    $misi = MisiTambahan::find($request->id_misi); // Cari misi berdasarkan ID

    if (!$misi) {
        return redirect()->back()->withErrors(['Misi tidak ditemukan.']);
    }

    $data = [
        'id_transaksi' => $request->id_transaksi,
        'npm' => Auth::user()->npm ?? 'N/A', // Ambil npm pengguna yang login
        'nama_misi' => $misi->nama_misi,
        'point' => $misi->harga_point,
        'tanggal_transaksi' => $request->tanggal_transaksi,
        'id_jenis_transaksi' => $request->id_jenis_transaksi,
        'status' => 'pending', // Set status awal
    ];

    if ($request->hasFile('file_bukti')) {
        $data['file_bukti'] = $request->file('file_bukti')->store('bukti_transaksi', 'public');
    }

    RiwayatPembelianJenisTransaksi::create($data);

    return redirect('/riwayat_pembelian_jenis_transaksi/create')->with('success', 'Misi berhasil diajukan dan menunggu validasi admin.');
}


    public function store(Request $request)
    {
        $request->validate([
            'id_transaksi' => 'required|string',
            'id_misi' => 'required|integer',
            'tanggal_transaksi' => 'required|date',
            'file_bukti' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048',
            'id_jenis_transaksi' => 'required|integer',
        ]);

        $misi = MisiTambahan::find($request->id_misi); // Cari misi berdasarkan ID

        if (!$misi) {
            return redirect()->back()->withErrors(['Misi tidak ditemukan.']);
        }

        $data = [
            'id_transaksi' => $request->id_transaksi,
            'npm' => Auth::user()->npm ?? 'N/A', // Ambil npm pengguna yang login
            'nama_misi' => $misi->nama_misi,
            'point' => $misi->harga_point,
            'tanggal_transaksi' => $request->tanggal_transaksi,
            'id_jenis_transaksi' => $request->id_jenis_transaksi,
            'status' => 'pending', // Set status awal
        ];

        if ($request->hasFile('file_bukti')) {
            $data['file_bukti'] = $request->file('file_bukti')->store('bukti_transaksi', 'public');
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
