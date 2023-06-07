<?php

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

Route::get('/cars', [ShowCarsController::class, 'show']);
Route::post('/cars', [PostCarsController::class, 'post']);

Route::post('/motorcycles', [PostMotorcyclesController::class, 'post']);
Route::get('/motorcycles', [ShowMotorcyclesController::class, 'show']);


Route::post('/cars/sell/{_id}', [SellCarsController::class, 'sell']);
Route::post('/motorcycles/sell/{_id}', [SellMotorcyclesController::class, 'sell']);

Route::get('stock', [ShowStockVehiclesController::class, 'show']);

Route::get('/report_sales_cars', [ShowReportSalesCarsController::class, 'show']);
Route::get('/report_sales_motorcycles', [ShowReportSalesMotorcyclesController::class, 'show']);
