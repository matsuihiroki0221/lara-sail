<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SalesProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('categories/tags_index', [CategoryController::class, 'tagsIndex']);
Route::post('sales_product',[SalesProductController::class, 'store']);

Route::get('sales_product/index_for_customer/{id}',[SalesProductController::class, 'index']);
Route::middleware('auth:sanctum')->group(function () {
    Route::post('sales_product/change_status', [SalesProductController::class, 'changeStatus']);
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::resource('products',ProductController::class)->only([
        'store', 'update', 'destroy'
    ]);
    Route::resource('sales_product', SalesProductController::class)->except([
        'create','store'
    ]);
    Route::resource('categories', CategoryController::class)->only([
        'store', 'update', 'destroy'
    ]);
});

Route::post('products/{product}',[ProductController::class, 'update']);
Route::resource('products',ProductController::class)->only([
    'index', 'show',
]);
Route::resource('categories', CategoryController::class)->only([
    'index', 'show',
]);



Route::post('/login',[App\Http\Controllers\LoginController::class, 'login']);
Route::post('/logout',[App\Http\Controllers\LoginController::class, 'logout']);