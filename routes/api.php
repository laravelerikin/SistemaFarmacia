<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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

Route::post('products/create', [ProductController::class, 'create']);

Route::get('products/list', [ProductController::class, 'list']);

Route::get('products/show/{product}', [ProductController::class, 'show']);

Route::delete('products/{product}', [ProductController::class, 'delete']);
