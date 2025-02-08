<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatMisi extends Model
{
    use HasFactory;

    protected $table = 'riwayat_misi'; // Nama tabel di database

    protected $fillable = [
        'id_misi',
        'npm',
        'nama_misi',
        'deskripsi',
        'point',
        'tanggal_transaksi',
        'file_bukti',
        'status',
    ];
    public function misi()
    {
        return $this->belongsTo(MisiTambahan::class, 'id_misi');
    }
}

