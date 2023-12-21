<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RiwayatPembelian;

class RiwayatPembelianController extends Controller
{
    public function index()
    {
        $riwayat_pembelian = RiwayatPembelian::with(['riwayat_pembelian', 'barangproject'])->get();

        return view('riwayat_pembelian.index', compact('riwayat_pembelian'));
    }
}
