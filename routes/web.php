<?php
// Controler Login
use App\Http\Controllers\loginController;


// Controler CRUD
use App\Http\Controllers\tbMemberController;
use App\Http\Controllers\tbOutletController;
use App\Http\Controllers\tbPaketController;


// Controler Transaksi
use App\Http\Controllers\tbTransaksi2Controller;
use App\Http\Controllers\tbTransaksiController;


// Controler Simulasi
use App\Http\Controllers\barang_inventarisController;
use App\Http\Controllers\Simulasi_Gaji_Controller;
use App\Http\Controllers\Simulasi_databarang_Controller;
use App\Http\Controllers\Simulasi_Penjemputan_Controller;
use App\Http\Controllers\simulasiController;
use App\Http\Controllers\tbUsersController;
use App\Http\Controllers\tes2;

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





// Controller Yang Bisa Di Akses Admin Dan Kasir

Route::middleware('guest')->group(function () {
    Route::get('/login', [loginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [loginController::class, 'login']);
    Route::get('/', function () {
        return view('login/index');
    });
});
Route::post('/logout', [loginController::class, 'logout'])->name('logout');
Route::middleware('auth')->group(function () {

    Route::prefix('/')->group(function () {
        Route::get('/', function () {
            return view('template/index');
        });
        Route::middleware('level:admin')->group(function () {
            Route::resource('/users', tbUsersController::class);
            Route::resource('/outlet', tbOutletController::class);
            Route::resource('/paket', tbPaketController::class);

            // Import
            Route::post('/paketimport', [tbpaketController::class, 'excelImport'])->name('paketimport');

            // Export
            Route::get('/paketexport', [tbpaketController::class, 'excelExport'])->name('paketexport');

            // Simulasi
            Route::resource('/penjemputan', Simulasi_Penjemputan_Controller::class);
            Route::resource('/databarang', Simulasi_databarang_Controller::class);
            Route::resource('/gaji', Simulasi_Gaji_Controller::class);
            Route::resource('/simulasi-1', simulasiController::class);
            Route::resource('/simulasi-2', tes2::class);
            Route::get('/Tbarang', function () {
                return view('simulasi.TransaksiBarang/index');
            });
            Route::get('/data', function () {
                return view('simulasi.databarang.data');
            });

            // Simulasi Template
            Route::get('/template', [Simulasi_Penjemputan_Controller::class, 'templateImport'])->name('template');

            // Simulasi Import

            Route::post('/penjemputanimport', [Simulasi_Penjemputan_Controller::class, 'excelImport'])->name('penjemputanimport');

            // Simulasi Export
            Route::get('/penjemputanexport', [Simulasi_Penjemputan_Controller::class, 'excelExport'])->name('penejemputanexport');

            // Simulasi DomPDF
            Route::get('/penjemputanfaktur', [Simulasi_Penjemputan_Controller::class, 'cetak_pdf'])->name('penjemputanfaktur');

            // Simulasi Status
            Route::post('/status', [Simulasi_Penjemputan_Controller::class, 'status'])->name('status');
            Route::post('/status_db', [Simulasi_databarang_Controller::class, 'status'])->name('status_db');
        });

        // Controller Yang Bisa Di Akses Admin Dan Kasir
        Route::middleware('level:admin,kasir')->group(function () {
            route::resource('/barang', barang_inventarisController::class);
            Route::resource('/transaksi2', tbTransaksi2Controller::class);
            Route::resource('/member', tbMemberController::class);

            // Import Excel
            Route::post('/memberimport', [tbMemberController::class, 'excelImport'])->name('memberimport');

            // Export Excel
            Route::get('/memberexport', [tbMemberController::class, 'excelExport'])->name('memberexport');

            // DomPDF
            Route::get('/faktur', [tbTransaksi2Controller::class, 'cetak_pdf']);
        });
    });
});
