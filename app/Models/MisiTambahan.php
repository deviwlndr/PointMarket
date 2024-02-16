<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MisiTambahan extends Model
{
    protected $table = 'misi_tambahan';
    use HasFactory;
    protected $guarded = ['id_misi'];
    protected $primaryKey = 'id_misi'; // Sesuaikan dengan nama kolom kunci utama Anda
    protected $keyType = 'string';
}