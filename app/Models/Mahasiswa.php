<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *     title="Mahasiswa",
 *     description="Mahasiswa model",
 *     @OA\Xml(name="Mahasiswa"),
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         description="ID of the mahasiswa",
 *         example=1
 *     ),
 *     @OA\Property(
 *         property="npm",
 *         type="string",
 *         description="NPM of the mahasiswa",
 *         example="714220054"
 *     ),
 *     @OA\Property(
 *         property="nama_mahasiswa",
 *         type="string",
 *         description="Name of the mahasiswa",
 *         example="Devi Wulandari"
 *     ),
 *     @OA\Property(
 *         property="jumlah_point",
 *         type="integer",
 *         description="Total points of the mahasiswa",
 *         example=100
 *     )
 * )
 */
class Mahasiswa extends Model
{
    use HasFactory;
    protected $table = 'mahasiswa'; 
    protected $fillable = ['npm', 'nama_mahasiswa', 'jumlah_point'];
}

