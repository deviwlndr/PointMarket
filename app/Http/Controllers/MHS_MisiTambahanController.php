<?php

namespace App\Http\Controllers;

use App\Models\MHS_MisiTambahan;
use App\Models\MisiTambahan;
use Illuminate\Http\Request;

class MHS_MisiTambahanController extends Controller
{
    public function index()
    {
        $misitambahans = MHS_MisiTambahan::all();
        return view('dashboardmahasiswa.mhs_misitambahan', compact('misitambahans'));
    }
}
