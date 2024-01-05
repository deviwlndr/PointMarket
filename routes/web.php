<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\BarangprojectController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormKumpulkanMisiController;
use App\Http\Controllers\FormPembelianController;
use App\Http\Controllers\JenisTransaksiController;
use App\Http\Controllers\LevelMahasiswaController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MHS_BarangProjectController;
use App\Http\Controllers\MHS_MisiTambahanController;
use App\Http\Controllers\MHSPointController;
use App\Http\Controllers\RiwayatPembelianBarangController;
use App\Http\Controllers\RiwayatPembelianController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Route Misi Tambahan
Route::get('/dashboard',  [\App\Http\Controllers\DashboardController::class, 'index']);
Route::get('/misitambahan',  [\App\Http\Controllers\MisitambahanController::class, 'index']);
Route::post('/misitambahan',  [\App\Http\Controllers\MisitambahanController::class, 'store']);
Route::get('/misitambahan/create',  [\App\Http\Controllers\MisitambahanController::class, 'create']);
Route::get('/misitambahan/{id}/edit',  [\App\Http\Controllers\MisitambahanController::class, 'edit']);
Route::put('/misitambahan/{id}',  [\App\Http\Controllers\MisitambahanController::class, 'update']);
Route::delete('/misitambahan/{id}',  [\App\Http\Controllers\MisitambahanController::class, 'destroy']);

//Route Barang Project
Route::get('/barangproject',[BarangprojectController::class,'project'] );
Route::get('/barangproject/create',[BarangprojectController::class,'create'] );
Route::post('/barangproject/store',[BarangprojectController::class,'store'] );
Route::get('/barangproject/{kode}/edit',[BarangprojectController::class,'edit']);
Route::put('/barangproject/{id}',[BarangprojectController::class,'update']);
Route::delete('/barangproject/{id}',[BarangprojectController::class,'destroy']);

//Route untuk jenis transaksi
Route::get('/jenistransaksi',[JenisTransaksiController::class,'index'] );
Route::post('/jenistransaksi',[JenisTransaksiController::class,'store'] );
Route::get('jenistransaksi/create',[JenisTransaksiController::class,'create'] );
Route::get('/jenistransaksi/{id}/edit', [JenisTransaksiController::class, 'edit']);
Route::put('/jenistransaksi/{id}', [JenisTransaksiController::class, 'update']);
Route::delete('/jenistransaksi/{id}', [JenisTransaksiController::class, 'destroy']);

//route register
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);

//route login
Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'store']);

//route riwayat pembelian admin
Route::get('/riwayat_pembelian/admin', [RiwayatPembelianController::class, 'index']);
Route::get('/riwayat_pembelian_barang/admin', [RiwayatPembelianBarangController::class, 'index']);

//Route riwayat pembelian misi mahasiswa dan ambil misi
Route::get('/riwayat_pembelian_misi', [RiwayatPembelianController::class, 'index_mahasiswa_misi']);
Route::post('/riwayat_pembelian_misi', [RiwayatPembelianController::class, 'store']);
Route::get('/riwayat_pembelian_misi/create{id}', [RiwayatPembelianController::class, 'create']);

//Route riwayat pembelian barang mahasiswa dan pembelian barang
Route::get('/riwayat_pembelian_barang', [RiwayatPembelianBarangController::class, 'index_mahasiswa_barang']);
Route::post('/riwayat_pembelian_barang', [RiwayatPembelianBarangController::class, 'store']);
Route::get('/riwayat_pembelian_barang/create', [RiwayatPembelianBarangController::class, 'create']);

//route untuk mahasiswa
Route::get('/mahasiswa', [MahasiswaController::class, 'index']);
Route::post('/mahasiswa', [MahasiswaController::class, 'store']);
Route::get('/mahasiswa/create', [MahasiswaController::class, 'create']);
Route::get('/mahasiswa/{id}/edit', [MahasiswaController::class, 'edit']);
Route::put('/mahasiswa/{id}', [MahasiswaController::class, 'update']);
Route::delete('/mahasiswa/{id}', [MahasiswaController::class, 'destroy']);

//route dashboard mahasiswa 
Route::get('/dashboard_mahasiswa',  [\App\Http\Controllers\DashboardMahasiswaController::class, 'index']);
Route::get('/level_mahasiswa', [LevelMahasiswaController::class, 'user']);
Route::get('/level_mahasiswa/point', [MHSPointController::class, 'point']);
Route::get('/mhs_misitambahan', [MHS_MisiTambahanController::class, 'index']);
Route::get('/mhs_barangproject', [MHS_BarangProjectController::class, 'index']);



