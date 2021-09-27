<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PigsController;
use App\Http\Controllers\StockController;
use App\Models\Stocks;

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

Route::get('/', function () {

    return view('welcome');
});

Route::resource('/pigs', PigsController::class);
Route::resource('/records', PigsController::class);
Route::resource('/stock', StockController::class);
Route::get('/stockUpdate',[StockController::class, 'update']);
Route::get('/pigshow',[PigsController::class, 'show']);
Route::get('/reduceStock/{id}', [StockController::class, 'countDecrement']);
//Route::get('/reduceStock', [StockController::class, ' countDecrement']);
Route::get('/pigs-report', [App\Http\Controllers\PigsController::class, 'downloadPDF']);
Route::get('/stock-report', [StockController::class, 'downloadPDF']);
Route::post('/savepig', [App\Http\Controllers\PigsController::class, 'store'])->name('savepig');
Route::post('/savestock', [App\Http\Controllers\StockController::class, 'store'])->name('savestock');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
