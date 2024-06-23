<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Jabatan\JabatanController;
use App\Http\Controllers\pegawai\PegawaiController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::middleware('auth')->group(function() {
    Route::resource('/dashboard', DashboardController::class)->names('dashboard');
    Route::resource('/jabatan', JabatanController::class)->names('jabatan');
    Route::resource('/pegawai', PegawaiController::class)->names('pegawai');
});
