<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barangproject extends Model
{
    use HasFactory;
    protected $table = 'barangproject';
    //protected $fillable = ['kode','nama_barang']
    protected $guarded = [];
}