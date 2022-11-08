<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\HomeProductController;

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

/* Route::get('/', function () {
    return view('welcome');
}); */
Route::get('/register', [App\Http\Controllers\RegisterController::class, 'create'])->name('register');
Route::post('/register', [App\Http\Controllers\RegisterController::class, 'store'])->name('register');
Route::get('/login', [App\Http\Controllers\LoginController::class, 'create'])->name('login');
Route::post('/login', [App\Http\Controllers\LoginController::class, 'store'])->name('login');
Route::get('/logout', [App\Http\Controllers\LoginController::class, 'destroy'])->name('logout');

//rutas client
Route::resource('home', App\Http\Controllers\HomeController::class);
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home.index');

Route::get('/categoria/{category}', [App\Http\Controllers\HomeCategoryController::class, 'show'])->name('homecategory.show');
Route::get('/producto/{product}', [App\Http\Controllers\HomeProductController::class, 'show'])->name('homeproduct.show');
Route::get('/perfil', [App\Http\Controllers\HomePerfilController::class, 'show'])->name('homeperfil.show');
Route::resource('cart', App\Http\Controllers\CartController::class);

//rutas admin
Route::resource('user', App\Http\Controllers\UserController::class);
Route::resource('sale', App\Http\Controllers\SaleController::class);
Route::get('salesfilter', [App\Http\Controllers\SaleController::class, 'filter'])->name('sale.filter');
Route::post('salesfilterpost', [App\Http\Controllers\SaleController::class, 'filterpost'])->name('sale.filterpost');
Route::resource('product', App\Http\Controllers\ProductController::class);
Route::resource('category', App\Http\Controllers\CategoryController::class);
