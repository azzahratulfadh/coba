<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\MahasiswaDashboardController;
use App\Http\Controllers\DosenDashboardController;
use App\Http\Controllers\JurusanDashboardController;
use App\Http\Controllers\BeritaDashboardController;
use App\Http\Controllers\KategoriDashboardController;

use App\Http\Controllers\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard.index');
});


Route::get ('/login', [LoginController::class,'login'])->name('login')->middleware('guest');
Route::post ('/logout', [LoginController::class,'logout']);
Route::post ('/login', [LoginController::class,'authenticate']);


Route::resource('mahasiswa', MahasiswaController::class)->middleware('auth');
Route::resource('dosen', DosenController::class)->middleware('auth');
Route::resource('jurusan', JurusanController::class)->middleware('auth');
Route::resource('berita', BeritaController::class)->middleware('auth');

Route::get('/berita/{id}', [BeritaController::class,'show']);

Route::resource('mahasiswadashboard', MahasiswaDashboardController::class)->middleware('auth');
Route::resource('dosendashboard', DosenDashboardController::class)->middleware('auth');
Route::resource('jurusandashboard', JurusanDashboardController::class)->middleware('auth');
Route::resource('beritadashboard', BeritaDashboardController::class)->middleware('auth');

Route::resource('kategoridashboard', KategoriDashboardController::class);

Route::get('/index', function () {
    return view('dashboard.index');
});

Route::get('/laporanmahasiswa/cetakmahasiswa', [MahasiswaDashboardController::class, 'cetakmahasiswa'])->name('cetakmahasiswa')->middleware('auth');
Route::get('/laporanjurusan/cetakjurusan', [JurusanDashboardController::class, 'cetakjurusan'])->name('cetakjurusan')->middleware('auth');

//register

Route::get('register', [RegisterController::class, 'register'])->name('register');
Route::post('register/action', [RegisterController::class, 'actionregister'])->name('actionregister');