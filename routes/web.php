<?php

use App\Http\Controllers\tbMemberController;
use App\Http\Controllers\tbOutletController;
use App\Http\Controllers\tbPaketController;
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

Route::get('/', function () {
    return view('template.index');
});

Route::resource('/outlet', tbOutletController::class);
Route::resource('/member', tbMemberController::class);
Route::resource('/paket', tbPaketController::class);
Route::resource('/users', tbUsersController::class);
