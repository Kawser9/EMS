<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ProductController;
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

Route::get('/products', [ProductController::class, 'allProduct']);
Route::get('/allImage', [ProductController::class, 'allImage']);
Route::get('/products/{id}', [ProductController::class, 'singleProduct']);
Route::post('/products/store', [ProductController::class, 'storeProduct']);
Route::put('/products/update/{id}', [ProductController::class, 'updateProduct']);
Route::delete('/products/delete/{id}', [ProductController::class, 'deleteProduct']);

Route::get('/categories/ddd', [CategoryController::class, 'ddd']);
Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/categories/{id}', [CategoryController::class, 'show']);
Route::post('/categories/store', [CategoryController::class, 'store']);
Route::put('/categories/update/{id}', [CategoryController::class, 'update']);
Route::delete('/categories/delete/{id}', [CategoryController::class, 'delete']);

Route::get('/categories/order/data', [CategoryController::class, 'orderDetails']);
