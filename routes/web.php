<?php

use App\Http\Controllers\MainController;
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

Route::get('/', [MainController :: class, 'home'])
    ->name('home');

Route::get('/delete/{product}', [MainController :: class, 'productDelete'])
    ->name('product.delete');

Route::get('/product/create', [MainController :: class, 'productCreate'])
    ->name('product.create');

Route::post('/product/create', [MainController :: class, 'productStore'])
    ->name('product.store');