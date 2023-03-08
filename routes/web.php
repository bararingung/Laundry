<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Beranda;
use App\Http\Controllers\Kasir;
use App\Http\Controllers\Owner;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserdataController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\CetakController;
use App\Http\Controllers\TransactionController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::resource('/', BerandaController::class);
Route::controller(LoginController::class)->group(function(){
    Route::get('/', 'index')->name('login');
    Route::post('login/proses', 'proses');
    Route::get('logout', 'logout')->name('logout');
    Route::resource('beranda', BerandaController::class);
    Route::resource('outlet',OutletController::class);
    Route::resource('Registrasi', RegisterController::class);
    Route::resource('Userdata', UserdataController::class);
    Route::resource('Package', PackageController::class);
    Route::resource('Transaction', TransactionController::class);
    Route::resource('Cetak', CetakController::class);
});

?>
