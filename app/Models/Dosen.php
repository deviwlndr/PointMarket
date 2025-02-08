<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    protected $table = 'dosen';

    protected $fillable = [
        'id',
        'kode_dosen',
        'name',
        'email',
        'telepon',
        'foto_profil',
        'alamat',
    ];
}
