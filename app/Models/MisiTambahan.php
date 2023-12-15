<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MisiTambahan extends Model
{
    protected $table = 'misitambahan';
    use HasFactory;
    protected $guarded = ['id'];
}