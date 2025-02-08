<?php

namespace App\Http\Controllers;


use App\Models\MisiTambahan;
use App\Models\RiwayatMisi;
use Illuminate\Http\Request;

class MHS_MisiTambahanController extends Controller
{
    public function index()
    {
        $misitambahans = MisiTambahan::all();

        return view('dashboardmahasiswa.mhs_misitambahan', compact('misitambahans'));
    }

    // Tampilkan form untuk mengambil misi
    public function create(Request $request)
    {

        // Ambil data misi berdasarkan ID
        $misi = MisiTambahan::where('id_misi', $request->id_misi)->first();

        if (!$misi) {
            return redirect()->back()->withErrors(['Misi tidak ditemukan.']);
        }

        // Kirim data misi ke view
        return view('riwayat_misi/create', compact('misi'));
    }

    // Simpan transaksi misi
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'id_misi' => 'required|integer|', // Pastikan ID misi valid
            'npm' => 'required|string|size:9', // Pastikan NPM memiliki panjang tetap (misal 9 karakter)
            'nama_misi' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:255',
            'point' => 'required|integer|min:0', // Tidak boleh angka negatif
            'file_bukti' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048', // Validasi file
        ]);
    
        // Validasi bahwa pengguna hanya bisa mengakses data miliknya (IDOR)
        if (auth()->user()->role === 'mahasiswa' && auth()->user()->npm !== $request->npm) {
            abort(403, 'Anda tidak berhak mengakses data ini.');
        }
    
        // Simpan file bukti ke folder "uploads" di storage/public
        $filePath = $request->file('file_bukti')->store('file_bukti', 'public');
    
        // Simpan data ke database
        RiwayatMisi::create([
            'id_misi' => $request->id_misi,
            'npm' => $request->npm,
            'nama_misi' => $request->nama_misi,
            'deskripsi' => $request->deskripsi,
            'point' => $request->point,
            'tanggal_transaksi' => now(), // Gunakan now() untuk tanggal saat ini
            'file_bukti' => $filePath, // Simpan path file di database
            'status' => 'pending',
        ]);
    
        // Redirect sesuai dengan role pengguna
        if (auth()->user()->role === 'admin') {
            // Redirect ke halaman admin
            return redirect()->route('riwayat_misi.hasil')->with('success', 'Misi berhasil diajukan!');
        } else {
            // Redirect ke halaman profil mahasiswa
            return redirect()->route('profile')->with('success', 'Misi berhasil diajukan!');
        }
    }
    
    
    public function hasil()
    {
        // Ambil riwayat hanya untuk mahasiswa yang sedang login
        $riwayatTransaksi = RiwayatMisi::all();

        // Kirim data ke view
        return view('riwayat_misi/index', compact('riwayatTransaksi'));
    }

    public function complete($id)
    {
        // Cari transaksi berdasarkan ID
        $transaksi = RiwayatMisi::findOrFail($id);

        // Ubah status menjadi 'completed'
        $transaksi->update([
            'status' => 'completed', // Harus sesuai dengan ENUM ('completed')
        ]);

        return redirect()->back()->with('success', 'Status berhasil diperbarui menjadi Completed!');
    }
}
