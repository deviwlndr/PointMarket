<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'mahasiswa';
    use HasFactory;
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(Login::class, 'npm', 'npm');
    }
}

