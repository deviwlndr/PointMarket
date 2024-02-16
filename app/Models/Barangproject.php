<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barangproject extends Model
{
    use HasFactory;
    protected $table = 'barang_project';
    protected $guarded = ['id_barang'];
    protected $primaryKey = 'id_barang';
    protected $keyType = 'string';
}