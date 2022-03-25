<?php
use App\Http\Controllers\CetakLaporanController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PemasukanController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SatuanController;
use Illuminate\Support\Facades\Auth;
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
    return view('auth.login');
});

Auth::routes([
    'register' => false,
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:admin']],
    function () {
        Route::get('admin', function () {
            return view('admin.index');
        });
        Route::resource('users', UserController::class);
        Route::resource('barang', BarangController::class);
        Route::resource('customer', CustomerController::class);
        Route::resource('kasir', KasirController::class);
        Route::resource('kategori', KategoriController::class);
        Route::resource('satuan', SatuanController::class);
        Route::resource('order', OrderController::class);
        Route::resource('transaksi', TransaksiController::class);
        // Route::get('keuangan', [KeuanganController::class, 'index'])->name('keuangan.index');
        // Route::get('pemasukan', [PemasukanController::class, 'index'])->name('pemasukan.index');
        // Route::resource('pengeluaran', PengeluaranController::class);

        Route::prefix('keuangan')->group(function () {
            Route::get('/', [KeuanganController::class, 'index'])->name('keuangan.index');
            Route::get('pemasukan', [PemasukanController::class, 'index'])->name('pemasukan.index');
            Route::resource('pengeluaran', PengeluaranController::class)->except('show');
        });

        Route::get('struk/{id}', [TransaksiController::class, 'struk'])->name('struk');
        Route::get('laporan', [CetakLaporanController::class, 'laporanKeluar'])->name('getlaporanKeluar');
        Route::post('laporan', [CetakLaporanController::class, 'cetaklaporanKeluar'])->name('laporanKeluar');
    });

Route::group(['prefix' => 'kasir', 'middleware' => ['auth', 'role:kasir|admin']],
    function () {

        Route::get('kasir', function () {
            return view('kasir.index');
        });
        Route::resource('order', OrderController::class);
        Route::resource('transaksi', TransaksiController::class);
        Route::get('struk', [TransaksiController::class, 'struk'])->name('struk');

    });
