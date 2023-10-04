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
Route::get('/ulasan', [\App\Http\Controllers\UlasanController::class, 'index'])->name('index');
Route::post('/ulasan', [\App\Http\Controllers\UlasanController::class, 'store'])->name('create');

//Dashboard
Route::get('/dashboard', [\App\Http\Controllers\admin\DashboardController::class, 'index'])->name('dashboard.index');
Route::resource('/dashboard/ulasan', \App\Http\Controllers\admin\DashboardUlasanController::class);