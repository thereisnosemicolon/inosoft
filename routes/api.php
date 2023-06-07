<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Cars\PostCarsController;
use App\Http\Controllers\Cars\SellCarsController;
use App\Http\Controllers\Cars\ShowCarsController;
use App\Http\Controllers\Motorcycles\PostMotorcyclesController;
use App\Http\Controllers\Motorcycles\SellMotorcyclesController;
use App\Http\Controllers\Motorcycles\ShowMotorcyclesController;
use App\Http\Controllers\Report\ShowReportSalesCarsController;
use App\Http\Controllers\Report\ShowReportSalesMotorcyclesController;
use App\Http\Controllers\Stock\ShowStockVehiclesController;
use Illuminate\Support\Facades\Route;


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::post('register', [AuthController::class, 'register']);

Route::get('/cars', [ShowCarsController::class, 'show'])->middleware('auth:api');

Route::post('/cars', [PostCarsController::class, 'post'])->middleware('auth:api');

Route::post('/motorcycles', [PostMotorcyclesController::class, 'post'])->middleware('auth:api');
Route::get('/motorcycles', [ShowMotorcyclesController::class, 'show'])->middleware('auth:api');


Route::post('/cars/sell/{_id}', [SellCarsController::class, 'sell'])->middleware('auth:api');
Route::post('/motorcycles/sell/{_id}', [SellMotorcyclesController::class, 'sell'])->middleware('auth:api');

Route::get('stock', [ShowStockVehiclesController::class, 'show'])->middleware('auth:api');

Route::get('/report_sales_cars', [ShowReportSalesCarsController::class, 'show'])->middleware('auth:api');
Route::get('/report_sales_motorcycles', [ShowReportSalesMotorcyclesController::class, 'show'])->middleware('auth:api');


Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout']);
Route::post('refresh', [AuthController::class, 'logout']);
