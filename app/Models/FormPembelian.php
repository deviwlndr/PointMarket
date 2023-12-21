<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormPembelian extends Model
{
    protected $table = 'formpembelian';
    use HasFactory;
    protected $guarded = ['id'];
}
