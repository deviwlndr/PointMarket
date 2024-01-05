<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatPembelianBarang extends Model
{
    protected $table = 'riwayat_pembelian_barang';
    use HasFactory;
    protected $guarded = ['id'];
}
