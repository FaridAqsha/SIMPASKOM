<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\PelatihanController;
use App\Http\Controllers\SerkomController;
use App\Http\Controllers\ValidasiController;
use App\Http\Controllers\HomeController;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Profiler\Profile;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', [DashboardController::class, 'index'])
//     ->middleware(['auth', 'verified']);



Route::get('/auth/redirect', [SocialiteController::class, 'redirect']);
Route::get('/auth/google/callback', [SocialiteController::class, 'callback']);

Route::get('auth/fill_jabatan/{id}', [SocialiteController::class, 'fill_jabatan'])->name('jabatan.fill')->middleware(['auth', 'verified']);
Route::put('/update_jabatan/{id}', [SocialiteController::class, 'update_jabatan'])->name('jabatan.update')->middleware(['auth', 'verified']);

Route::get('auth/fill_bidang/{id}', [SocialiteController::class, 'fill_bidang'])->name('bidang.fill')->middleware(['auth', 'verified']);
Route::put('/update_bidang/{id}', [SocialiteController::class, 'update_bidang'])->name('bidang.update')->middleware(['auth', 'verified']);



Route::get('/', [HomeController::class, 'index'])
    ->middleware(['auth', 'verified']);

Route::get('/home', [HomeController::class, 'index'])->name('home');


Route::get('/admin_dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard')
    ->middleware(['auth', 'verified']);


Route::get('/user_dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard')
    ->middleware(['auth', 'verified']);

// notif badge
Route::post('/mark-notifications-as-read', [AkunController::class, 'markAsRead']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/Admin/akun/akun', [AkunController::class, 'index'])->middleware(['auth', 'verified']);
Route::get('/Admin/akun/detail', [AkunController::class, 'detail_akun'])->middleware(['auth', 'verified']);

// Pelatihan
Route::get('/Admin/pelatihan/pelatihan', [PelatihanController::class, 'index'])->name('pelatihan.index')->middleware(['auth', 'verified']);
Route::get('/Dosen/pelatihan/create', [PelatihanController::class, 'create_pelatihan'])->name('pelatihan.create')->middleware(['auth', 'verified']);
Route::post('/Dosen/pelatihan/store', [PelatihanController::class, 'store_pelatihan'])->name('pelatihan.store')->middleware(['auth', 'verified']);

Route::get('/Admin/pelatihan/detail/{id}', [PelatihanController::class, 'detail_pelatihan'])->name('pelatihan.detail')->middleware(['auth', 'verified']);

Route::get('/Admin/pelatihan/edit/{id}', [PelatihanController::class, 'edit'])->name('pelatihan.edit')->middleware(['auth', 'verified']);
Route::put('/Admin/pelatihan/update/{id}', [PelatihanController::class, 'update'])->name('pelatihan.update')->middleware(['auth', 'verified']);
Route::delete('/Admin/pelatihan/materi/delete/{id}', [PelatihanController::class, 'delete_materi'])->name('pelatihan.materi.delete')->middleware(['auth', 'verified']);

Route::delete('/Admin/pelatihan/delete/{id}', [PelatihanController::class, 'destroy'])->name('pelatihan.delete')->middleware(['auth', 'verified']);

Route::get('/Admin/pelatihan/detail/materi/{id}', [PelatihanController::class, 'downloadmat'])->name('pelatihan.materi')->middleware(['auth', 'verified']);
Route::get('/Admin/pelatihan/detail/sertifikat/{id}', [PelatihanController::class, 'downloadsert'])->name('pelatihan.sertifikat')->middleware(['auth', 'verified']);
Route::get('/Admin/pelatihan/edit', [PelatihanController::class, 'edit_pelatihan'])->middleware(['auth', 'verified']);


// Serkom
Route::get('/Admin/serkom/serkom', [SerkomController::class, 'index'])->name('serkom.index')->middleware(['auth', 'verified']);
Route::get('/Dosen/serkom/create', [SerkomController::class, 'create_serkom'])->name('serkom.create')->middleware(['auth', 'verified']);
Route::post('/Dosen/serkom/store', [SerkomController::class, 'store_serkom'])->name('serkom.store')->middleware(['auth', 'verified']);

Route::get('/Admin/serkom/detail/{id}', [SerkomController::class, 'detail_serkom'])->name('serkom.detail')->middleware(['auth', 'verified']);

Route::get('/Admin/serkom/edit/{id}', [SerkomController::class, 'edit'])->name('serkom.edit')->middleware(['auth', 'verified']);
Route::put('/Admin/serkom/update/{id}', [SerkomController::class, 'update'])->name('serkom.update')->middleware(['auth', 'verified']);
Route::delete('/Admin/serkom/materi/delete/{id}', [SerkomController::class, 'delete_materi'])->name('serkom.materi.delete')->middleware(['auth', 'verified']);

Route::delete('/Admin/serkom/delete/{id}', [SerkomController::class, 'destroy'])->name('serkom.delete')->middleware(['auth', 'verified']);

Route::get('/Admin/serkom/detail/materi/{id}', [SerkomController::class, 'downloadmat'])->name('serkom.materi')->middleware(['auth', 'verified']);
Route::get('/Admin/serkom/detail/sertifikat/{id}', [SerkomController::class, 'downloadsert'])->name('serkom.sertifikat')->middleware(['auth', 'verified']);
Route::get('/Admin/serkom/edit', [SerkomController::class, 'edit_serkom']);

// Input Pengetahuan
Route::view('/inputpengetahuan', 'inputpengetahuan')->middleware(['auth', 'verified']);

// Validasi
Route::get('/Admin/validasi/validasi', [ValidasiController::class, 'index'])->name('validasi.index')->middleware(['auth', 'verified']);
Route::get('/Admin/validasi/aksi/{id}/{jenis}', [ValidasiController::class, 'validasi_aksi'])->name('validasi.aksi')->middleware(['auth', 'verified']);
Route::put('/Admin/validasi/update/{id}/{jenis}', [ValidasiController::class, 'update'])->name('validasi.update')->middleware(['auth', 'verified']);

// User Akun
Route::get('/Admin/akun/akun', [AkunController::class, 'index'])->name('akun.index')->middleware(['auth', 'verified']);
Route::get('/Admin/akun/detail/{id}', [AkunController::class, 'detail_akun'])->name('akun.detail')->middleware(['auth', 'verified']);
Route::get('/Admin/akun/edit/{id}', [AkunController::class, 'edit'])->name('akun.edit')->middleware(['auth', 'verified']);
Route::put('/Admin/akun/update/{id}', [AkunController::class, 'update'])->name('akun.update')->middleware(['auth', 'verified']);

// Profile Akun
Route::get('/Admin/profile/detail/{id}', [ProfileController::class, 'detail_profile'])->name('profile.detail')->middleware(['auth', 'verified']);
Route::get('/Admin/profile/edit/{id}', [ProfileController::class, 'edit_profile'])->name('profile.edit')->middleware(['auth', 'verified']);
Route::put('/Admin/profile/update/{id}', [ProfileController::class, 'update_profile'])->name('profile.update')->middleware(['auth', 'verified']);

require __DIR__ . '/auth.php';
