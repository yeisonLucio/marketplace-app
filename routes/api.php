<?php

use App\Http\Controllers\Orders\GetOrderSummaryController;
use App\Http\Controllers\Orders\BuyProductController;
use App\Http\Controllers\Orders\GetOrderListController;
use App\Http\Controllers\Orders\PayOrderController;
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

Route::prefix('v1.0')->group(function () {
    Route::prefix('/orders')->group(function () {
        Route::post('/buy-product', [BuyProductController::class, 'handler']);
        Route::get('/get-order-summary/{orderId}', [GetOrderSummaryController::class, 'handler'])
            ->name('getOrderSummary');
        Route::post('/pay-order', [PayOrderController::class, 'handler']);
        Route::get('/get-all-orders', [GetOrderListController::class, 'handler']);
    });
});
