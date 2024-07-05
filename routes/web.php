<?php

use App\Http\Controllers\CetakController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MapsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VerifikasiController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\RekapController;
use App\Http\Controllers\OtorisasiPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;

use Illuminate\Support\Facades\Auth;

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



Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// users
Route::resource('user', UserController::class);
// profile
Route::resource('profile', ProfileController::class);
Route::resource('password', PasswordController::class)->middleware('auth');
Route::post('/reset-password', [ForgotPasswordController::class, 'resetPassword'])->name('password.reset');

Route::group(['middleware' => 'profile.check'], function () {
    // Routes that require profile check
    Route::resource('customer', CustomerController::class);
    Route::resource('verifikasi', VerifikasiController::class);
    Route::resource('cetak', CetakController::class);
    Route::resource('maps', MapsController::class);
    Route::resource('rekap', RekapController::class)->middleware('auth');
        Route::resource('otorisasi-password', \App\Http\Controllers\OtorisasiPasswordController::class)->middleware('auth');

    
    
});
