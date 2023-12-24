<?php

namespace App\Http\Controllers;

use App\Models\FormKumpulkanMisi;
use App\Models\LevelMahasiswa;
use App\Models\Mahasiswa;
use App\Models\MisiTambahan;
use App\Models\User;
use Illuminate\Http\Request;

class FormKumpulkanMisiController extends Controller
{
    public function formpengumpulanmisi($id)
    {
        $misitambahan = FormKumpulkanMisi::find($id);        
        return view('dashboardmahasiswa.formpengumpulanmisi', compact('misitambahan'));
    }

    public function submitmisi(Request $request)
    {
        

        return redirect()->back()->with('success', 'Misi berhasil dikumpulkan. Point Anda bertambah!');
    }    
    


}
