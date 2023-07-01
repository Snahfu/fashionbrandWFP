<?php

use App\Http\Controllers\JenisController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProdukController;
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

// Jenis
Route::resource('jenis', JenisController::class);
Route::post('jenis/getEditForm', [JenisController::class, 'getEditForm'])->name('jenis.getEditForm');

// Kategori
Route::resource('kategori', KategoriController::class);
Route::post('kategori/getEditForm', [KategoriController::class, 'getEditForm'])->name('kategori.getEditForm');

// Produk
Route::resource('produk', ProdukController::class);