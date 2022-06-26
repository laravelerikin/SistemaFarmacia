<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BuyProductController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'products', 'middleware' => 'auth:api'], function () {
    Route::post('create', [ProductController::class, 'create']);
    Route::get('list', [ProductController::class, 'list']);
    Route::get('show/{product}', [ProductController::class, 'show']);
    Route::delete('{product}', [ProductController::class, 'delete']);
    Route::put("{product}", [ProductController::class, 'update']);
});

Route::prefix('buys')->group(function(){
    Route::apiResource("products", BuyProductController::class);
});


Route::post('sales/create', [SaleController::class, 'create']);
Route::get('sales/list', [SaleController::class, 'list']);
Route::get('sales/show/{sale}', [SaleController::class, 'show']);
Route::delete('sales/{sale}', [SaleController::class, 'delete']);
Route::put("sales/{sale}", [SaleController::class, 'update']);
