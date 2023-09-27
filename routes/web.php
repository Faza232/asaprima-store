<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('index');
});

//ulasan
Route::get('/ulasan', [\App\Http\Controllers\UlasanController::class, 'index'])->name('ulasan.index');
Route::post('/ulasan', [\App\Http\Controllers\UlasanController::class, 'create'])->name('ulasan.create');

//Dashboard
Route::get('/dashboard', [\App\Http\Controllers\admin\DashboardController::class, 'index'])->name('dashboard.index');
Route::get('/dashboard/ulasan', [\App\Http\Controllers\admin\TanggapanController::class, 'index'])->name('dashboard.ulasan.index');