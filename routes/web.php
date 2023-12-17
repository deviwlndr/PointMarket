<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\BarangprojectController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JenisTransaksiController;
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

//Route Login dan Register
// Route untuk menampilkan halaman login
Route::get('/login', [LoginController::class, 'index'])->name('login');

// Route untuk menghandle auth
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);

//Route untuk jenis transaksi
Route::get('/jenistransaksi',[JenisTransaksiController::class,'index'] );
Route::post('/jenistransaksi',[JenisTransaksiController::class,'store'] );
Route::get('jenistransaksi/create',[JenisTransaksiController::class,'create'] );
Route::get('/jenistransaksi/{id}/edit', [JenisTransaksiController::class, 'edit']);
Route::put('/jenistransaksi/{id}', [JenisTransaksiController::class, 'update']);
Route::delete('/jenistransaksi/{id}', [JenisTransaksiController::class, 'destroy']);



