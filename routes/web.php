<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApiMahasiswaController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController as AuthLoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\BarangprojectController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\FormKumpulkanMisiController;
use App\Http\Controllers\FormPembelianController;
use App\Http\Controllers\JenisTransaksiController;
use App\Http\Controllers\LevelMahasiswaController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MHS_BarangProjectController;
use App\Http\Controllers\MHS_JenisTransaksiController;
use App\Http\Controllers\MHS_MisiTambahanController;
use App\Http\Controllers\MHSPointController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RiwayatPembelianBarangController;
use App\Http\Controllers\RiwayatPembelianController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SlideController;
use App\Models\MHS_MisiTambahan;
use App\Models\RiwayatPembelianBarang;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use Illuminate\Support\Facades\Mail;

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



use App\Mail\TestEmail;




Route::get('/', [MHS_MisiTambahanController::class, 'index']);

Route::get('/test-email', function () {
    Mail::to('deviwulan@gmail.com', 'riela1126@gmail.com')->send(new TestEmail());
    return 'Email telah dikirim!';
});


Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ForgotPasswordController::class, 'reset'])->name('password.update');


//route register
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);

Route::middleware(['auth', 'role:admin,dosen'])->group(function () {
    Route::get('layouts/master', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/profile', [DashboardController::class, 'profile'])->name('admin.profile');
    Route::get('/dosen/profile', [DosenController::class, 'profile'])->name('dosen.profile');
});


Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dosen', [DosenController::class, 'index'])->name('dosen.index');
    Route::get('/dosen/create', [DosenController::class, 'create'])->name('dosen.create');
    Route::post('/dosen', [DosenController::class, 'store'])->name('dosen.store');
    Route::get('/dosen/{id}/edit', [DosenController::class, 'edit'])->name('dosen.edit');
    Route::put('/dosen/{id}', [DosenController::class, 'update'])->name('dosen.update');
    Route::delete('/dosen/{id}', [DosenController::class, 'destroy'])->name('dosen.destroy');
});


//Route Misi Tambahan
Route::middleware(['auth', 'role:admin,dosen'])->group(function () {
    Route::get('/misitambahan',  [\App\Http\Controllers\MisitambahanController::class, 'index']);
});
Route::middleware(['auth', 'role:dosen'])->group(function () {
    Route::post('/misitambahan',  [\App\Http\Controllers\MisitambahanController::class, 'store']);
    Route::get('/misitambahan/create',  [\App\Http\Controllers\MisitambahanController::class, 'create']);
    Route::get('/misitambahan/{id_misi}/edit',  [\App\Http\Controllers\MisitambahanController::class, 'edit']);
    Route::put('/misitambahan/{id_misi}',  [\App\Http\Controllers\MisitambahanController::class, 'update']);
    Route::delete('/misitambahan/{id_misi}',  [\App\Http\Controllers\MisitambahanController::class, 'destroy']);
});

//Route Barang Project
Route::middleware(['auth', 'role:admin,dosen'])->group(function () {
    Route::get('/barangproject',[BarangprojectController::class,'project'] );
});
Route::middleware(['auth', 'role:dosen'])->group(function () {
    Route::get('/barangproject/create',[BarangprojectController::class,'create'] );
    Route::post('/barangproject/store',[BarangprojectController::class,'store'] );
    Route::get('/barangproject/{id}/edit',[BarangprojectController::class,'edit']);
    Route::put('/barangproject/{id}',[BarangprojectController::class,'update'])->name('barangproject.update');
    Route::delete('/barangproject/{id}',[BarangprojectController::class,'destroy']);
});

//Route untuk jenis transaksi
Route::middleware(['auth', 'role:admin,dosen'])->group(function () {
    Route::get('/jenistransaksi',[JenisTransaksiController::class,'index'] );
}); 
Route::middleware(['auth', 'role:dosen'])->group(function () {
    Route::post('/jenistransaksi',[JenisTransaksiController::class,'store'] );
    Route::get('jenistransaksi/create',[JenisTransaksiController::class,'create'] );
    Route::get('/jenistransaksi/{id_jenis_transaksi}/edit', [JenisTransaksiController::class, 'edit']);
    Route::put('/jenistransaksi/{id_jenis_transaksi}', [JenisTransaksiController::class, 'update']);
    Route::delete('/jenistransaksi/{id_jenis_transaksi}', [JenisTransaksiController::class, 'destroy']);
});
//Route untuk mahasiswa

//Route profile
Route::middleware(['auth'])->get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::post('/upload-foto', [ProfileController::class, 'uploadProfile'])->name('upload.foto');
Route::get('/profile/{id}', [ProfileController::class, 'showProfile'])->middleware('auth');



//route untuk mahasiswa

Route::get('/mahasiswa', [MahasiswaController::class, 'index']);
Route::post('/mahasiswa', [MahasiswaController::class, 'store']);
Route::middleware(['auth', 'role:admin,dosen'])->group(function () {
    Route::get('/mahasiswa/create', [MahasiswaController::class, 'create']);
    Route::get('/mahasiswa/{id}/edit', [MahasiswaController::class, 'edit']);
    Route::put('/mahasiswa/{id}', [MahasiswaController::class, 'update']);
    Route::delete('/mahasiswa/{id}', [MahasiswaController::class, 'destroy']);
});

//route dashboard mahasiswa 
Route::get('/PointMarket/mahasiswa',  [\App\Http\Controllers\DashboardMahasiswaController::class, 'index']);
Route::get('/level_mahasiswa', [LevelMahasiswaController::class, 'user']);
Route::get('/mhs_misitambahan', [MHS_MisiTambahanController::class, 'index']);
Route::get('/mhs_barangproject', [MHS_BarangProjectController::class, 'index']);
Route::get('/mhs_jenistransaksi', [MHS_JenisTransaksiController::class, 'index']);

//Riwayat misi tambahan
Route::get('/mhs_misi_tambahan', [MHS_MisiTambahanController::class, 'index'])->name('mhs_misi_tambahan.index');
Route::post('/riwayat_misi', [MHS_MisiTambahanController::class, 'store'])->name('riwayat_misi.store');
Route::get('/riwayat_misi/create', [MHS_MisiTambahanController::class, 'create'])->name('riwayat_misi.create');
Route::get('/riwayat_misi/hasil', [MHS_MisiTambahanController::class, 'hasil'])->middleware('auth')->name('riwayat_misi.hasil');
Route::middleware(['auth', 'role:admin,dosen'])->group(function () {
    Route::patch('/riwayat-misi/{id}/complete', [MHS_MisiTambahanController::class, 'complete'])->name('riwayat-misi.complete');
});


//RiwayatBarang
Route::get('/riwayat_barang/create', [MHS_BarangProjectController::class, 'create'])->name('riwayat_barang.create');
Route::post('/riwayat_barang/store', [MHS_BarangProjectController::class, 'store'])->name('riwayat_barang.store');
Route::get('/riwayat_barang/hasil', [MHS_BarangProjectController::class, 'hasil'])->name('riwayat_barang.hasil');
Route::middleware(['auth', 'role:admin,dosen'])->group(function () {
    Route::post('/riwayat_barang/redeem', [MHS_BarangProjectController::class, 'redeem'])->name('riwayat_barang.redeem');  
});

//Search misi
Route::get('/search', [SearchController::class, 'search_admin']);
Route::get('/search', [SearchController::class, 'search_mhs']);

Route::post('/logout', function () {
    Auth::logout(); // Logout user
    request()->session()->invalidate(); // Hapus sesi
    request()->session()->regenerateToken(); // Regenerasi CSRF token
    return redirect('/login');
})->name('logout');











Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
