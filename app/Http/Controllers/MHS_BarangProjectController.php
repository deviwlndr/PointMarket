<?php

namespace App\Http\Controllers;

use App\Models\Barangproject;
use Illuminate\Http\Request;

class MHS_BarangProjectController extends Controller
{
    public function index()
    {
        $barangprojects = Barangproject::all();
        return view('dashboardmahasiswa.mhs_barangproject', compact('barangprojects'));
    }
}