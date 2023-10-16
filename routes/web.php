<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UlasanController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\DashboardUlasanController;
use App\Http\Controllers\admin\DashboardArtikelController;
use App\Http\Controllers\Home;

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

//ulasan
Route::get('/ulasan', [UlasanController::class, 'index'])->name('index');
Route::post('/ulasan', [UlasanController::class, 'store'])->name('create');

//artikel
Route::get('/artikel', [ArtikelController::class, 'index'])->name('index');
Route::get('/artikel/show', [ArtikelController::class, 'show'])->name('index');

//Dashboard
Route::put('/dashboard/ulasan/{ulasan}/approve', [DashboardUlasanController::class, 'approve'])->name('ulasan.approve');
Route::put('/dashboard/ulasan/{ulasan}/notapprove', [DashboardUlasanController::class, 'notapprove'])->name('ulasan.notapprove');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
Route::resource('/dashboard/ulasan', DashboardUlasanController::class);
Route::resource('/dashboard/artikel', DashboardArtikelController::class);


