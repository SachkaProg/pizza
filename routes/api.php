<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PizzaController;
use App\Http\Controllers\AdditionController;
use App\Http\Controllers\GoodsController;
use App\Http\Controllers\CategoryController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/create-pizza', 'App\Http\Controllers\PizzaController@createPizza');

Route::get('/get-pizza', 'App\Http\Controllers\PizzaController@getPizza');
Route::get('/get-categories', 'App\Http\Controllers\CategoryController@getCategories');

Route::post('/get-goods', 'App\Http\Controllers\GoodsController@getGoods');

Route::get('/get-sauces', 'App\Http\Controllers\GoodsController@getSauces');


Route::post('/create-addition', 'App\Http\Controllers\AdditionController@createAddition');

Route::get('/get-additions', 'App\Http\Controllers\AdditionController@getAdditions');


Route::post('/get-ingradient-item', 'App\Http\Controllers\AdditionController@IngradientItemByName');

