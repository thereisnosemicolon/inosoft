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

Route::get('/', function(){

    echo "Inosoft-Kevin Pratama";
});
