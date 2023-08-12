<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\DukunganController;
use App\Http\Controllers\IdentitasController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RelawanController;
use App\Http\Controllers\SettingController;
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

Route::get('/', [BerandaController::class, 'caleg']);
Route::get('/profile', [ProfileController::class, 'profile']);
Route::get('/berita', [IdentitasController::class, 'berita']);
Route::get('/relawan', [RelawanController::class, 'relawan']);
Route::get('/dukungan', [DukunganController::class, 'dukungan']);
Route::post('/create-relawan', [IdentitasController::class, 'storeRelawan']);

Route::middleware(\App\Http\Middleware\AdminMiddleware::class)->group(function () {
    Route::controller(AdminController::class)->group(function () {
        Route::get('admin/identitas', 'identitas');
        Route::post('admin/create-identitas', 'store');
        Route::post('admin/edit-identitas', 'update');
        Route::get('admin/delete-identitas/{id}', 'delete');
        Route::get("/logout",  "logout");
    });
    Route::controller(AgendaController::class)->group(function () {
        Route::get('admin/agenda', 'index');
        Route::post('admin/create-agenda', 'store');
        Route::post('admin/edit-agenda', 'update');
        Route::get('admin/delete-agenda/{id}', 'delete');
    });
    Route::controller(DukunganController::class)->group(function () {
        Route::get('admin/dukungan', 'index');
        Route::post('admin/create-dukungan', 'store');
        Route::post('admin/edit-dukungan', 'update');
        Route::get('admin/delete-dukungan/{id}', 'delete');
    });
    Route::controller(ProfileController::class)->group(function () {
        Route::get('admin/profile', 'index');
        Route::post('admin/create-profile', 'store');
        Route::post('admin/edit-profile', 'update');
        Route::get('admin/delete-profile/{id}', 'delete');
    });
    Route::controller(BeritaController::class)->group(function () {
        Route::get('admin/berita', 'index');
        Route::post('admin/create-berita', 'store');
        Route::post('admin/edit-berita', 'update');
        Route::get('admin/delete-berita/{id}', 'delete');
    });
    Route::controller(RelawanController::class)->group(function () {
        Route::get('admin/relawan', 'index');
        Route::post('admin/create-relawan', 'store');
        Route::post('admin/edit-relawan', 'update');
        Route::get('admin/delete-relawan/{id}', 'delete');
    });
    Route::controller(SettingController::class)->group(function () {
        Route::get('admin/setting', 'setting');
        Route::post('admin/create-setting', 'store');
        Route::post('admin/edit-setting', 'update');
        Route::post('admin/updateStatus', 'updateStatus')->name('updateStatus');
        Route::get('admin/delete-setting/{id}', 'delete');
    });
});

Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'login')->middleware('guest');
    Route::post('postLogin', "postLogin");
});
