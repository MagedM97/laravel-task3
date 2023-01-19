<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;
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

Route::get('/', [HomeController::class, 'view_index']);
Route::get('/shop', [HomeController::class, 'view_shop']);
Route::get('/add-product', [HomeController::class, 'add_product']);
Route::get('/admin', [AdminController::class, 'view_admin']);
Route::get('/w', function(){return view('welcome');});
Route::get('/checkout',[CheckoutController::class, 'view_checkout']) ;
Route::get('/cart', [CartController::class, 'view_cart']) ;
Route::get('/addproduct/{id}', [CartController::class, 'addProduct']);
Route::get('/addproduct/{id}/{process}', [CartController::class,'process']);

Route::prefix('/admin')->group (function () {

    Route::get('/categories', [CategoriesController::class, 'index']);
    Route::post('/categories', [CategoriesController::class, 'store'])->name('categories.index');
    Route::get('/category/create', [CategoriesController::class, 'create']);
    Route::get('/category/{id}/edit', [CategoriesController::class, 'edit']);
    Route::put('/category/{id}', [CategoriesController::class, 'update']);
    Route::get('/category/{id}/show', [CategoriesController::class, 'show']);
    Route::delete('/category/{id}/', [CategoriesController::class, 'delete']);
    Route::get('/products/{id}/show', [ProductsController::class, 'show']);
    Route::resource('products', ProductsController::class);
});