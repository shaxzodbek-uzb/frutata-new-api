<?php

use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\PartnerController as AdminPartnerController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RequestController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::resource('partners', PartnerController::class);
Route::resource('news', NewsController::class);
Route::post('requests', [RequestController::class, 'store']);
Route::resource('products', ProductController::class);
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::resource('products', AdminProductController::class);
    Route::resource('news', AdminNewsController::class);
    Route::resource('partners', AdminPartnerController::class);
});