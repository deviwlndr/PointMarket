<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LevelMahasiswa extends Model
{
    
    protected $table = 'level_mahasiswa';
    use HasFactory;
    protected $guarded = ['id'];
}

