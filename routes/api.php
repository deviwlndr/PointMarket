<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Api\ApiMahasiswaController;
use App\Http\Controllers\Api\ApiMisiTambahanController;
use App\Http\Controllers\Api\ApiBarangProjectController;
use App\Http\Controllers\api\ApiJenisTransaksiController;
use App\Http\Controllers\api\ApiRiwayatMisiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->group(function () {
    // Route bawaan untuk mendapatkan user
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    
   
}); 

Route::get('/', function () {
    return response()->json([
        'message' => 'Welcome to the laravel API'
    ]);
});
    

Route::get('/mahasiswa', [ApiMahasiswaController::class, 'index']);
Route::get('/mahasiswa/{id}', [ApiMahasiswaController::class, 'show']);
Route::post('/mahasiswa', [ApiMahasiswaController::class, 'store']);
Route::put('/mahasiswa/{id}', [ApiMahasiswaController::class, 'update']);
Route::delete('/mahasiswa/{id}', [ApiMahasiswaController::class, 'destroy']);


// Route API untuk Misi Tambahan
Route::get('/misitambahan', [ApiMisiTambahanController::class, 'index']);
Route::get('/misitambahan/{id}', [ApiMisiTambahanController::class, 'show']);
Route::post('/misitambahan', [ApiMisiTambahanController::class, 'store']);
Route::put('/misitambahan/{id}', [ApiMisiTambahanController::class, 'update']);
Route::delete('/misitambahan/{id}', [ApiMisiTambahanController::class, 'destroy']);

Route::get('/barangproject', [ApiBarangProjectController::class, 'project']);
Route::get('/barangproject/{id}', [ApiBarangProjectController::class, 'show']);
Route::post('/barangproject', [ApiBarangProjectController::class, 'store']);
Route::put('/barangproject/{id}', [ApiBarangProjectController::class, 'update']);
Route::delete('/barangproject/{id}', [ApiBarangProjectController::class, 'destroy']);

Route::get('/jenistransaksi', [ApiJenisTransaksiController::class, 'index']);
Route::post('/jenistransaksi', [ApiJenisTransaksiController::class, 'store']);
Route::put('/barangproject/{id}', [ApiJenisTransaksiController::class, 'update']);
Route::delete('/barangproject/{id}', [ApiJenisTransaksiController::class, 'destroy']);

Route::get('/riwayat_misi', [ApiRiwayatMisiController::class, 'index']);
Route::post('/riwayat_misi', [ApiRiwayatMisiController::class, 'store']);
Route::put('/riwayat_misi/{id}', [ApiRiwayatMisiController::class, 'update']);
Route::delete('/riwayat_misi/{id}', [ApiRiwayatMisiController::class, 'destroy']);
