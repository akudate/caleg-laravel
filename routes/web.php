<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\IdentitasController;
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

Route::get('/', [IdentitasController::class, 'caleg']);

Route::controller(AdminController::class)->group(function () {
    Route::get('admin/identitas', 'identitas');
    Route::post('admin/create-identitas', 'store');
    Route::post('admin/edit-identitas', 'update');
    Route::get('admin/delete-identitas/{id}', 'delete');
});
