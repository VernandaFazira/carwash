<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\LoginController;
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\IsSuperAdmin;

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
Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('home', [HomeController::class, 'index'])->name('home')->middleware('auth');;
Route::resource('anggota', AnggotaController::class);
Route::resource('kategori', KategoriController::class);
Route::resource('user', UserController::class);
Route::resource('layanan', LayananController::class);


Route::middleware(['auth', 'verified'])->group(function () {
    //dapat diakses oleh IsSuperAdmin dan IsAdmin
    Route::get('home', [HomeController::class, 'index'])->name('home');
    Route::resource('kategori', KategoriController::class);
    
    Route::middleware([IsSuperAdmin::class])->group(function () {
        //sidebar yang diakses IsSuperAdmin
        Route::resource('anggota', AnggotaController::class);
    });
    
    Route::middleware([IsAdmin::class])->group(function () {
        //sidebar yang diakses IsAdmin

    });
});

