<?php

use App\Http\Controllers\Home;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\DashboardReviewController;
use App\Http\Controllers\admin\DashboardArticleController;
use App\Http\Controllers\admin\DashboardProductController;
use App\Http\Controllers\admin\DashboardCarouselController;
use App\Http\Controllers\admin\DashboardCategoryController;
use App\Http\Controllers\admin\DashboardCertificateController;
use App\Http\Controllers\admin\DashboardSubCategoryController;


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


//product
Route::get('/product', [ProductController::class, 'index'])->name('c.product.index');
Route::get('/product/{product:slug}', [ProductController::class, 'show'])->name('c.product.show');

//review
Route::get('/review', [ReviewController::class, 'index'])->name('c.review.index');
Route::post('/review', [ReviewController::class, 'store'])->name('c.review.create');

//article
Route::get('/article', [ArticleController::class, 'index'])->name('c.article.index');
Route::get('/article/{article:slug}', [ArticleController::class, 'show'])->name('c.article.show');

//certificate
Route::get('/certificate', [CertificateController::class, 'index'])->name('c.certificate.index');
Route::get('/certificate/show', [CertificateController::class, 'show'])->name('c.certificate.show');

//contact
Route::get('/contact', [Home::class, 'contact'])->name('c.contact');

// AUTHENTICATION ROUTING AREA
Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/login/action', 'loginAction')->name('login.action');
    Route::get('/logout', 'logout')->middleware('auth')->name('logout');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return redirect('/dashboard/product');
    })->name('dashboard');

    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerSave'])->name('register.save');

    //Dashboard
    Route::put('/dashboard/article/{article}/approve', [DashboardArticleController::class, 'approve'])->name('article.approve');
    Route::put('/dashboard/article/{article}/notapprove', [DashboardArticleController::class, 'notapprove'])->name('article.notapprove');

    Route::put('/dashboard/review/{review}/approve', [DashboardReviewController::class, 'approve'])->name('review.approve');
    Route::put('/dashboard/review/{review}/notapprove', [DashboardReviewController::class, 'notapprove'])->name('review.notapprove');

    Route::put('/dashboard/certificate/{certificate}/approve', [DashboardCertificateController::class, 'approve'])->name('certificate.approve');
    Route::put('/dashboard/certificate/{certificate}/notapprove', [DashboardCertificateController::class, 'notapprove'])->name('certificate.notapprove');

    Route::put('/dashboard/product{product}/approve', [DashboardProductController::class, 'approve'])->name('product.approve');
    Route::put('/dashboard/product/{product}/notapprove', [DashboardProductController::class, 'notapprove'])->name('product.notapprove');
    

    Route::get('/subcategory/{id}', [DashboardProductController::class,'getSubCategory'])->name('getSubCategory');

    Route::resource('/dashboard/category', DashboardCategoryController::class);
    Route::resource('/dashboard/subcategory', DashboardSubCategoryController::class);
    Route::resource('/dashboard/carousel', DashboardCarouselController::class);
    Route::resource('/dashboard/review', DashboardReviewController::class);
    Route::resource('/dashboard/article', DashboardArticleController::class);
    Route::resource('/dashboard/certificate', DashboardCertificateController::class);
    Route::resource('/dashboard/product', DashboardProductController::class);
});

