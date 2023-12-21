<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class RiwayatPembelian extends Model
{
    protected $table = 'riwayat_pembelian';
    protected $fillable = ['npm', 'kode_pembelian', 'nama_pembelian', 'tanggal_pembelian'];
    
    public function registrasi()
    {
        return $this->belongsTo(User::class, 'npm', 'npm');
    }

    public function misitambahan()
    {
        return $this->belongsTo(Misitambahan::class, 'kode_pembelian', 'kode_misi');
    }

    public function barangproject()
    {
        return $this->belongsTo(Barangproject::class, 'kode_pembelian', 'kode');
    }
}

