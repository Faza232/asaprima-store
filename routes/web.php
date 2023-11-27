<?php

use App\Http\Controllers\Home;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\DashboardProductController;
use App\Http\Controllers\admin\DashboardReviewController;
use App\Http\Controllers\admin\DashboardArticleController;
use App\Http\Controllers\admin\DashboardCategoryController;
use App\Http\Controllers\admin\DashboardCertificateController;


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


//product
Route::get('/product', [ProductController::class, 'index'])->name('index');
Route::get('/product/{product:slug}', [ProductController::class, 'show'])->name('index');

//review
Route::get('/review', [ReviewController::class, 'index'])->name('index');
Route::post('/review', [ReviewController::class, 'store'])->name('create');

//article
Route::get('/article', [ArticleController::class, 'index'])->name('index');
Route::get('/article/{article:slug}', [ArticleController::class, 'show'])->name('show');

//certificate
Route::get('/certificate', [CertificateController::class, 'index'])->name('index');
Route::get('/certificate/show', [CertificateController::class, 'show'])->name('index');

//contact
Route::get('/contact', [Home::class, 'contact'])->name('contact');

//Dashboard
Route::put('/dashboard/article/{article}/approve', [DashboardArticleController::class, 'approve'])->name('article.approve');
Route::put('/dashboard/article/{article}/notapprove', [DashboardArticleController::class, 'notapprove'])->name('article.notapprove');

Route::put('/dashboard/review/{review}/approve', [DashboardReviewController::class, 'approve'])->name('review.approve');
Route::put('/dashboard/review/{review}/notapprove', [DashboardReviewController::class, 'notapprove'])->name('review.notapprove');

Route::put('/dashboard/certificate/{certificate}/approve', [DashboardReviewController::class, 'approve'])->name('certificate.approve');
Route::put('/dashboard/certificate/{certificate}/notapprove', [DashboardReviewController::class, 'notapprove'])->name('certificate.notapprove');


Route::get('/dashboard', [ DashboardProductController::class, 'index'])->name('dashboard.index');
Route::get('/subcategory/{id}', [DashboardProductController::class,'getSubCategory'])->name('getSubCategory');

Route::resource('/dashboard/category', DashboardCategoryController::class);


Route::resource('/dashboard/review', DashboardReviewController::class);
Route::resource('/dashboard/article', DashboardArticleController::class);
Route::resource('/dashboard/certificate', DashboardCertificateController::class);
Route::resource('/dashboard/product', DashboardProductController::class);





