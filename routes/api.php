<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\SaleController;


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



Route::prefix('users')->group(function () {
	Route::post('/create',[UserController::class, 'createUser']);
	Route::post('/createadmin',[UserController::class, 'createAdmin'])->middleware('guest');
	Route::post('/login',[UserController::class,'login']);
	Route::post('/password',[UserController::class,'changePassword']);
});

Route::prefix('cards')->group(function () {

	Route::post('/create',[CardController::class, 'createCard'])->middleware('guest');

});

Route::prefix('collections')->group(function () {

	Route::post('/create',[CollectionController::class, 'createCollection'])->middleware('guest');
});

Route::prefix('sales')->group(function () {
	Route::post('/create',[SaleController::class, 'createSale'])->middleware('auth');
	Route::get('/list/{card_for_sale}',[SaleController::class, 'listSale'])->middleware('auth');
	Route::get('/listcompra/{card_for_sale}',[SaleController::class, 'listShop'])->middleware('auth');
});


