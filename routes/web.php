<?php

use App\Http\Controllers\JenisController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\OrderController;
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
Route::post('jenis/saveDataField', [JenisController::class, 'saveDataField'])->name('jenis.saveDataField');

// Kategori
Route::resource('kategori', KategoriController::class);
Route::post('kategori/getEditForm', [KategoriController::class, 'getEditForm'])->name('kategori.getEditForm');
Route::post('kategori/saveDataField', [KategoriController::class, 'saveDataField'])->name('kategori.saveDataField');

// Produk
Route::resource('produk', ProdukController::class);
Route::post('produk/getEditForm', [ProdukController::class, 'getEditForm'])->name('produk.getEditForm');
Route::post('produk/getShowModal', [ProdukController::class, 'getShowModal'])->name('produk.getShowModal');

// Order
Route::resource('order', OrderController::class);
Route::get('order/riwayat-transaksi', [OrderController::class, 'riwayatTransaksi'])->name('order.transaksi');

// Member
Route::resource('order', OrderController::class);