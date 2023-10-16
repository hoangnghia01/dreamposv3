<?php

use App\Http\Controllers\Cart\CartController;
use App\Http\Controllers\Client\CienltController;
use App\Http\Controllers\Client\ClientOrderController;
use App\Http\Controllers\Pos\OrderController;
// use App\Http\Controllers\CartController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/menu', [CienltController::class, 'index']);
Route::get('/getTable', [CienltController::class, 'getTable']);
Route::get('/product/filterProducts/{product_category_id}', [CienltController::class, 'filterProducts'])->name('product.filterProducts');

Route::get('/product/add-to-cart/{productId}', [CartController::class, 'addToCart'])->name('product.add-to-cart');
Route::get('/product/delete-to-cart/{productId}', [CartController::class, 'deleteToCart'])->name('product.delete-item-to-cart');
Route::get('/product/updateItem-to-cart/{productId}/{num}', [CartController::class, 'updateItem'])->name('product.update-to-cart');
Route::get('/product/delete-to-cart', [CartController::class, 'emptyCart'])->name('product.delete-to-cart');


Route::post('placeorderclient',[ClientOrderController::class, 'clientPlaceOrder'])->name('place-order-client');
Route::post('/save-review',[CienltController::class, 'saveReview']);
