<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CartController;
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

Route::controller(IndexController::class)->group(function () {
    Route::get('/','index')->name('home');

    Route::get('/login', 'login')->name('login');
    Route::get('/registration',  'registration')->name('registration');

    Route::get('/catalog', 'catalog')->name('catalog');
    Route::get('/catalog/{product}','product')->name('product');

    Route::get('/blog', 'blog')->name('blog');


    Route::middleware('auth')->group(function (){

        Route::prefix('/cart')->group(function () {
            Route::get('/', 'cart')->name('cart');

            Route::controller(CartController::class)->group(function (){
                Route::post('/add/{product}', 'addToCart')->name('addToCart');
                Route::delete('/remove/{cart}', 'removeFromCart')->name('removeFromCart');
                Route::delete('/clear', 'clearCart')->name('clearCart');
            });
        });


    });
});

Route::controller(AuthController::class)->group(function (){
   Route::post('/registration', 'registration')->name('registration_action');
   Route::post('/login', 'login')->name('login_action');
   Route::get('/logout', 'logout')->name('logout');
});





