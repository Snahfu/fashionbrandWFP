<?php

use App\Http\Controllers\JenisController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProdukController;
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

Route::middleware(['auth'])->group(function () {


Route::get('/', function () {
    return view('index');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

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

// Keranjang
Route::get('order/keranjang', [OrderController::class, 'keranjang'])->name('order.keranjang');

// Checkout
Route::get('order/checkout',[OrderController::class,'checkout'])->name('order.checkout');

// Order
Route::get('order/riwayat-transaksi', [OrderController::class, 'riwayatTransaksi'])->name('order.transaksi');
Route::get('order/riwayat-transaksi-owner', [OrderController::class, 'riwayatSemuaOrder'])->name('order.alltransaksi');
Route::resource('order', OrderController::class);

// Member
Route::resource('member', MemberController::class);

});

Auth::routes();

