<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormKumpulkanMisi extends Model
{
    protected $table = 'formpengumpulan';
    protected $guarded = ['id'];
    use HasFactory;
}
