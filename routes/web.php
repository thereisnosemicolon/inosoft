<?php

use App\Http\Controllers\Cars\PostCarsController;
use App\Http\Controllers\Cars\ShowCarsController;
use App\Http\Controllers\Motorcycles\PostMotorcyclesController;
use App\Http\Controllers\Motorcycles\ShowMotorcyclesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/cars', [ShowCarsController::class, 'show']);
Route::post('/cars', [PostCarsController::class, 'post']);
Route::post('/motorcycles', [PostMotorcyclesController::class, 'post']);
Route::get('/motorcycles', [ShowMotorcyclesController::class, 'show']);

