<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MHS_Point extends Model
{
    protected $table = 'mahasiswa';
    use HasFactory;
    protected $guarded = ['id'];
}
