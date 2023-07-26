<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\client\clientHomeController;
use App\Http\Controllers\client\ProductController;
use App\Http\Controllers\client\BlogController;
use App\Http\Controllers\client\ContactController;

use App\Http\Controllers\admin\AdminController;

use function Ramsey\Uuid\v1;

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

// client home route
Route::get('/', [clientHomeController::class, 'clientHome']);
Route::prefix('client')->group(function(){
    Route::get('/home', [clientHomeController::class, 'clientHome'])->name('homeClient');
    Route::get('/product', [ProductController::class, 'product_index'])->name('productindex');
    Route::get('/blog', [BlogController::class, 'blog_index'])->name('blogindex');
    Route::get('/contact', [ContactController::class, 'contact_index'])->name('contactindex');
});



