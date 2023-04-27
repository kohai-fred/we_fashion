<?php

use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\CategoryController as CategoryClientController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index']);

Route::get('/category/{slug}-{id}', [CategoryClientController::class, 'index'])->where(['slug' => '[a-z0-9\-]+', 'id' => '[0-9]+'])->name('category');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('product', ProductController::class)->except(['show']);
    Route::resource('category', CategoryController::class)->except(['show']);
});
