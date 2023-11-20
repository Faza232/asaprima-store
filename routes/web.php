<?php

use App\Http\Controllers\Home;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\UlasanController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\SertifikatController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\DashboardProdukController;
use App\Http\Controllers\admin\DashboardUlasanController;
use App\Http\Controllers\admin\DashboardArtikelController;
use App\Http\Controllers\admin\DashboardKategoriController;
use App\Http\Controllers\admin\DashboardSertifikatController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [Home::class, 'index'])->name('index');
Route::get('/certificates', function(){return view('frontend.certificates');});


//produk
Route::get('/produk', [ProdukController::class, 'index'])->name('index');

//ulasan
Route::get('/ulasan', [UlasanController::class, 'index'])->name('index');
Route::post('/ulasan', [UlasanController::class, 'store'])->name('create');

//artikel
Route::get('/artikel', [ArtikelController::class, 'index'])->name('index');
Route::get('/artikel/show', [ArtikelController::class, 'show'])->name('index');

//sertifikat
Route::get('/sertifikat', [SertifikatController::class, 'index'])->name('index');
Route::get('/sertifikat/show', [SertifikatController::class, 'show'])->name('index');

//contact
Route::get('/contact', [Home::class, 'contact'])->name('contact');

//Dashboard
Route::put('/dashboard/artikel/{artikel}/approve', [DashboardArtikelController::class, 'approve'])->name('artikel.approve');
Route::put('/dashboard/artikel/{artikel}/notapprove', [DashboardArtikelController::class, 'notapprove'])->name('artikel.notapprove');

Route::put('/dashboard/ulasan/{ulasan}/approve', [DashboardUlasanController::class, 'approve'])->name('ulasan.approve');
Route::put('/dashboard/ulasan/{ulasan}/notapprove', [DashboardUlasanController::class, 'notapprove'])->name('ulasan.notapprove');

Route::put('/dashboard/sertifikat/{sertifikat}/approve', [DashboardUlasanController::class, 'approve'])->name('sertifikat.approve');
Route::put('/dashboard/sertifikat/{sertifikat}/notapprove', [DashboardUlasanController::class, 'notapprove'])->name('sertifikat.notapprove');


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
Route::get('/subkategori/{id}', [DashboardProdukController::class,'getSubKategori'])->name('getSubKategori');

Route::resource('/dashboard/kategori', DashboardKategoriController::class);

Route::resource('/dashboard/ulasan', DashboardUlasanController::class);
Route::resource('/dashboard/artikel', DashboardArtikelController::class);
Route::resource('/dashboard/sertifikat', DashboardSertifikatController::class);
Route::resource('/dashboard/produk', DashboardProdukController::class);




