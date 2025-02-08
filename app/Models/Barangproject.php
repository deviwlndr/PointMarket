<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barangproject extends Model
/**
 * @OA\Schema(
 *     schema="BarangProject",
 *     title="Barang Project",
 *     description="Model untuk Barang Project",
 *     required={"id", "nama_barang", "kode_barang", "harga_point"},
 *     @OA\Property(property="id", type="integer", example=1, description="ID Barang Project"),
 *     @OA\Property(property="nama_barang", type="string", example="Notebook", description="Nama Barang"),
 *     @OA\Property(property="kode_barang", type="string", example="BRG001", description="Kode Barang"),
 *     @OA\Property(property="harga_point", type="integer", example=500, description="Harga dalam bentuk poin")
 * )
 */



{
    use HasFactory;

    protected $table = 'barang_project';
    protected $primaryKey = 'id_barang';
    protected $keyType = 'string';
    
    // Jika menggunakan guarded, pastikan tidak menghalangi update
    protected $guarded = [];  // Ini harus kosong jika Anda ingin update semua field

    // Alternatif: Gunakan fillable untuk mengontrol field yang dapat diupdate
    protected $fillable = [
        'kode_barang',
        'dosen',
        'nama_barang',
        'deskripsi',
        'harga_point'
    ];

    // Relasi ke RiwayatBarang
    public function riwayat()
    {
        return $this->hasMany(RiwayatBarang::class, 'id_barang');
    }
}
