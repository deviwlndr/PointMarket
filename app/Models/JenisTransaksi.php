<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisTransaksi extends Model
{
    protected $table = 'jenis_transaksi';
    use HasFactory;
    protected $guarded = ['id_jenis_transaksi'];
    protected $primaryKey = 'id_jenis_transaksi'; // Sesuaikan dengan nama kolom kunci utama Anda
    protected $keyType = 'string';
}    
