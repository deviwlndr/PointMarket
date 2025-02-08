<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DosenController extends Controller
{
    public function index()
    {
        $dosen = Dosen::all();
        return view('dashboarddosen.index', compact('dosen'));
    }

    public function create()
{
    return view('dashboarddosen.create');
}

public function store(Request $request)
{
    // Validasi input
    $request->validate([
        'kode_dosen' => 'required|unique:dosen,kode_dosen|max:10',
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:dosen,email',
        'telepon' => 'nullable|string|max:15',
        'alamat' => 'nullable|string|max:255',
    ]);

    // Simpan data ke database
    Dosen::create($request->all());

    return redirect()->route('dosen.index')->with('success', 'Data dosen berhasil ditambahkan.');
}

public function edit($id)
{
    $dosen = Dosen::findOrFail($id); // Mengambil data dosen berdasarkan ID
    return view('dosen.edit', compact('dosen')); // Kirimkan data dosen ke view
}


public function update(Request $request, $id)
{
    // Validasi input
    $request->validate([
        'kode_dosen' => 'required|unique:dosen,kode_dosen,' . $id . '|max:10',
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:dosen,email,' . $id,
        'telepon' => 'nullable|string|max:15',
        'alamat' => 'nullable|string|max:255',
    ]);

    // Cari data dosen dan update
    $dosen = Dosen::findOrFail($id);
    $dosen->update($request->all());

    return redirect()->route('dosen.index')->with('success', 'Data dosen berhasil diperbarui.');
}

public function destroy($id)
{
    // Cari data dosen berdasarkan ID
    $dosen = Dosen::where('role', 'dosen')->find($id);

    // Validasi jika data dosen tidak ditemukan
    if (!$dosen) {
        return redirect()->route('dosen.index')->withErrors(['message' => 'Data dosen tidak ditemukan.']);
    }

    // Hapus data dosen
    $dosen->delete();

    // Redirect kembali ke halaman index dengan pesan sukses
    return redirect()->route('dosen.index')->with('success', 'Data dosen berhasil dihapus.');
}



public function profile()
{
    // Ambil data dosen yang sedang login
    $dosen = Auth::user();

    // Pastikan role-nya adalah dosen
    if ($dosen->role !== 'dosen') {
        abort(403, 'Unauthorized action.');
    }

    return view('dashboarddosen.profile', compact('dosen'));
}



}
