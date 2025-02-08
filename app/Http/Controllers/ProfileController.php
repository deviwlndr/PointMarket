<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth; // Untuk mengambil user login
use App\Models\User;
use App\Models\RiwayatBarang;
use App\Models\RiwayatMisi;
use Illuminate\Http\Request;



class ProfileController extends Controller
{
    public function index()
    {

        // Ambil data pengguna yang sedang login
        $users = Auth::user();
        // Ambil data mahasiswa melalui relasi
        $mahasiswas = $users->mahasiswa;
        $riwayatTransaksi = auth()->user()->riwayatMisi;
        $riwayatbarang = RiwayatBarang::where('npm', auth()->user()->npm)->get() ?? [];


        // Kirim data ke view
        return view('dashboardmahasiswa.profile', [
            'user' => $users,
            'mahasiswa' => $mahasiswas,
            'riwayatTransaksi' => $riwayatTransaksi,
            'riwayatbarang' => $riwayatbarang,
        ]);
    }

    public function uploadProfile(Request $request)
    {
        // Validasi file yang diunggah
        $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Ambil pengguna yang sedang login
        $user = Auth::user();
        $user = Auth::user();

        if (!$user) {
            dd('User tidak login');
        }

        dd(get_class($user)); // Harus mengembalikan `App\Models\User`


        if (!$user) {
            return redirect()->back()->with('error', 'User tidak login');
        }

        // Simpan file foto ke folder 'storage/app/public/images'
        $path = $request->file('foto')->store('images', 'public');

        // Simpan path foto di database
        $user->foto_profil = $path;
        $user->save();

        return redirect()->back()->with('success', 'Foto profil berhasil diperbarui!');
    }

    public function showProfile($id)
    {
        if (auth()->user()->id !== (int) $id) {
            abort(403, 'Anda tidak berhak mengakses data ini.');
        }
        

        // Lanjutkan jika ID sesuai
        $user = User::findOrFail($id);
        return view('profile.show', compact('user'));
    }
}
