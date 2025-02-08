<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatBarang extends Model
{
    protected $table = 'riwayat_barang';
    use HasFactory;

    protected $fillable = [
        'id_barang', 
        'npm', 
        'nama_barang', 
        'deskripsi', 
        'point', 
        'tanggal_transaksi', 
        'kode_unik', 
        'bukti_terima',
        'status',
    ];

    protected $primaryKey = 'id_transaksi'; // Pastikan ini sesuai dengan kolom primary key
    protected $keyType = 'string'; // Jika primary key menggunakan string
    public $incrementing = false; // Jika primary key tidak auto increment

    // Relasi ke BarangProject
    public function barang()
    {
        return $this->belongsTo(BarangProject::class, 'id_barang');
    }
}
