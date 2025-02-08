<?php

namespace App\Http\Controllers;

use App\Models\Barangproject;
use App\Models\RiwayatBarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class MHS_BarangProjectController extends Controller
{
    public function index()
    {
        $barangprojects = Barangproject::all();
        return view('dashboardmahasiswa.mhs_barangproject', compact('barangprojects'));
    }

    public function create(Request $request)
    {
        // Ambil data misi berdasarkan ID
        $barang = Barangproject::where('id_barang', $request->id_barang)->first();

        if (!$barang) {
            return redirect()->back()->withErrors(['Reward tidak ditemukan.']);
        }
        return view('riwayat_barang/create', compact('barang'));
    }

    public function store(Request $request)
{
    Log::info('Fungsi store dipanggil', $request->all());  // Menampilkan data yang diterima oleh form

    // Validasi data input
    $request->validate([
        'id_barang' => 'required',
        'npm' => 'required|string|size:9', 
        'nama_barang' => 'required|string|max:255',
        'deskripsi' => 'required|string|max:255', 
        'point' => 'required|integer|min:0',
    ]);

    // Log jika validasi berhasil
    Log::info('Validasi berhasil');
    
    // Ambil data mahasiswa yang sedang login
    $user = auth()->user();
    $mahasiswa = $user->mahasiswa;

    if (!$mahasiswa) {
        return redirect()->back()->withErrors(['message' => 'Data mahasiswa tidak ditemukan.']);
    }

    // Validasi bahwa poin mahasiswa mencukupi
    if ($mahasiswa->jumlah_point < $request->point) {
        return redirect()->back()->withErrors(['message' => 'Poin Anda tidak mencukupi untuk transaksi ini.']);
    }

    // Kurangi poin mahasiswa
    $mahasiswa->jumlah_point -= $request->point;
    $mahasiswa->save();

    // Generate kode unik untuk transaksi
    $kodeUnik = 'REWARD-' . strtoupper(Str::random(5));

    // Simpan data ke tabel riwayat_barang
    $riwayat = RiwayatBarang::create([
        'id_barang' => $request->id_barang, 
        'npm' => $mahasiswa->npm, 
        'nama_barang' => $request->nama_barang, 
        'deskripsi' => $request->deskripsi, 
        'point' => $request->point, 
        'tanggal_transaksi' => now(), 
        'kode_unik' => $kodeUnik, 
        'status' => 'pending',  // Status langsung 'completed'
    ]);

    Log::info('Data Transaksi Disimpan', ['riwayat' => $riwayat]);

    // Redirect ke halaman profil mahasiswa
    return redirect()->route('profile')->with('success', 'Reward berhasil ditukar!');
}

    
    

public function redeem(Request $request)
{
    
    // Validasi input file
    $request->validate([
        'kode_unik' => 'required|string|exists:riwayat_barang,kode_unik',
        'bukti_terima' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
    ]);

    // Temukan transaksi berdasarkan kode_unik
    $transaksi = RiwayatBarang::where('kode_unik', $request->kode_unik)->first();

    if (!$transaksi) {
        return redirect()->back()->withErrors(['message' => 'Transaksi tidak ditemukan.']);
    }

    // Simpan file yang diunggah di folder 'file_bukti' dan simpan path-nya di database
    $filePath = $request->file('bukti_terima')->store('bukti_terima', 'public'); // Gunakan disk 'public'

 

    // Perbarui transaksi dengan path bukti terima dan ubah status transaksi menjadi 'completed'
    $transaksi->update([
        'bukti_terima' => $filePath,  // Simpan path file di kolom bukti_terima
        'status' => 'completed',      // Mengubah status menjadi completed
    ]);

    return redirect()->back()->with('success', 'Reward berhasil ditukarkan!');
    
}

    public function hasil()
    {
        // Ambil riwayat hanya untuk mahasiswa yang sedang login
        $riwayatbarang = RiwayatBarang::all();

        // Kirim data ke view
        return view('riwayat_barang.index', compact('riwayatbarang'));
    }
}
