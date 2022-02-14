<?php

use App\Http\Controllers\loginController;
use App\Http\Controllers\tbMemberController;
use App\Http\Controllers\tbOutletController;
use App\Http\Controllers\tbPaketController;
use App\Http\Controllers\tbTransaksiController;
use App\Http\Controllers\tbUsersController;
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


Route::middleware('guest')->group(function(){
    Route::get('/login', [loginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [loginController::class, 'login']);
    Route::get('/', function () {
        return view('login/index');
    });
});
Route::post('/logout', [loginController::class, 'logout'])->name('logout');
Route::middleware('auth')->group(function () {

    Route::prefix('/')->group(function(){
        Route::get('/', function () {
            return view('template/index');
        });
        Route::middleware('level:admin,super')->group(function () {
            Route::resource('/users', tbUsersController::class);
            Route::resource('/outlet', tbOutletController::class);
            Route::resource('/paket', tbPaketController::class);
    });

    Route::resource('/member', tbMemberController::class)->middleware('level:admin,kasir,super');
    });

    Route::resource('/transaksi', tbTransaksiController::class)->middleware('level:admin,kasir,super');

});

