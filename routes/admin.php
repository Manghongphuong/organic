<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\CateBlogController;
use App\Http\Controllers\admin\BlogController;
use App\Http\Controllers\admin\BannerController;

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
Route::get('/login_page', [AdminController::class, 'login_page'])->name('loginpage');
Route::post('/login', [AdminController::class, 'login'])->name('login');
Route::group(['middleware' => 'admin'], function () {
    Route::get('/', [AdminController::class, 'index'])->name('homeAdmin');
    Route::resources([
        'products' => ProductController::class,
        'categories' => CategoryController::class,
        'cateblogs'   => CateBlogController::class,
        'blogposts'  => BlogController::class,
        'banners'     => BannerController::class
    ]);
});