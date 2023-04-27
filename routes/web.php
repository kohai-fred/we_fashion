<?php

use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\CategoryController as CategoryClientController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController as ProductClientController;
use App\Http\Controllers\SoldeController;
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

$slugRegex = '[a-z0-9\-]+';
$idRegex = '[0-9]+';

Route::get('/', [HomeController::class, 'index']);

Route::get('/category/{slug}-{id}', [CategoryClientController::class, 'index'])->where(['slug' => $slugRegex, 'id' => $idRegex])->name('category');

Route::get('/solde', [SoldeController::class, 'index'])->name('solde');

Route::get('/product/{slug}-{product}', [ProductClientController::class, 'show'])->where(['slug' => $slugRegex, 'product' => $idRegex])->name('product.show');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('product', ProductController::class)->except(['show']);
    Route::resource('category', CategoryController::class)->except(['show']);
});
