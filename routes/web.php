<?php

use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PembeliController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes(
    [
        'register' => false, //menghilangkan fitur regis
        'reset' => false, //menghilangkan fitur forgot
    ]
);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::group(['prefix' => 'admin', 'middleware' =>
//     ['auth',
//         'role:admin',
//     ]], function () {
//     Route::get('/', function () {
//         return 'halaman admin';
//     });

//     Route::get('profile', function () {
//         return 'halaman profile admin';
//     });
// });

// Route::group(['prefix' => 'pengguna', 'middleware' =>
//     ['auth',
//         'role:pengguna',
//     ]], function () {
//     Route::get('/', function () {
//         return 'halaman pengguna';
//     });

//     Route::get('profile', function () {
//         return 'halaman profile pengguna';
//     });
// });

// Route::group(['prefix' => 'pembelian', 'middleware' =>
//     ['auth',
//         'role:admin|kasir',
//     ]], function () {
//     Route::get('/', function () {
//         return 'halaman pembelian';
//     });

//     Route::get('laporan', function () {
//         return 'halaman laporan pembelian';
//     });
// });

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::get('buku', function () {
        return view('buku.index');
    })->middleware(['role:admin|pengguna']);

    Route::get('pengarang', function () {
        return view('pengarang.index');
    })->middleware(['role:admin']);

    Route::get('obat', function () {
        return view('obat.index');
    })->middleware(['role:admin|pengguna']);

    Route::resource('obat', ObatController::class);

    Route::get('pembeli', function () {
        return view('pembeli.index');
    })->middleware(['role:admin|pengguna']);

    Route::resource('pembeli', PembeliController::class);

    Route::get('karyawan', function () {
        return view('karyawan.index');
    })->middleware(['role:admin|pengguna']);

    Route::resource('karyawan', KaryawanController::class);

    Route::get('transaksi', function () {
        return view('transaksi.index');
    })->middleware(['role:admin|pengguna']);

    Route::resource('transaksi', TransaksiController::class);

    Route::get('order', function () {
        return view('order.index');
    })->middleware(['role:admin|pengguna']);

    Route::resource('order', OrderController::class);

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
