<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatPembelianJenisTransaksi extends Model
{
    protected $table = 'riwayat_transaksi';
    use HasFactory;

    protected $fillable = ['id_transaksi', 'npm', 'transaksi', 'point', 'tanggal_transaksi', 'id_jenis_transaksi'];
    protected $primaryKey = 'id_transaksi_jenis'; // Kolom ini yang akan dianggap sebagai primary key
    protected $keyType = 'string';
    public $incrementing = false; 
}
