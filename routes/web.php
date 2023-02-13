<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/catalog', [CatalogController::class, 'catalog'])->name('catalog');
Route::get('/catalog/{id}', [CatalogController::class, 'product'])->name('product');
Route::get('/blog', [BlogController::class, 'blog'])->name('blog');
