<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MisiTambahan extends Model
{
    protected $table = 'misi_tambahan';
    use HasFactory;
    protected $fillable = [
        'kode_misi',
        'nama_misi',
        'deskripsi',
        'harga_point',
        'dosen',
    ];
    protected $primaryKey = 'id_misi'; // Sesuaikan dengan nama kolom kunci utama Anda
    protected $keyType = 'string';
     // Relasi ke RiwayatBarang
     public function riwayat()
     {
         return $this->hasMany(RiwayatMisi::class, 'id_misi');
     }
}