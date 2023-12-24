<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MHSPointController extends Controller
{
        
    public function point()
    {
        $mahasiswa = Mahasiswa::all();       
        return view('dashboardmahasiswa.Point', compact('mahasiswa'));
    }
}
