<?php

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
//     return view('index');
// });


Route::get('/pizza/list', [App\Http\Controllers\PizzaController::class, 'list'] )->name('pizzaList');;
Route::get('/pizza/delete', [App\Http\Controllers\PizzaController::class, 'delete'] )->name('pizzaDelete');
Route::get('/pizza/update', [App\Http\Controllers\PizzaController::class, 'delete'] )->name('pizzaUpdate');


Route::get('/goods/list', [App\Http\Controllers\GoodsController::class, 'list'] )->name('goodsList');;
Route::get('/goods/delete', [App\Http\Controllers\PizzaController::class, 'delete'] )->name('goodDelete');


Route::get('/category/list', [App\Http\Controllers\CategoryController::class, 'list'] )->name('categoryList');;
Route::get('/category/delete', [App\Http\Controllers\CategoryController::class, 'delete'] )->name('goodDelete');
Route::get('/category/create', [App\Http\Controllers\CategoryController::class, 'create'] )->name('categoryCreate');

Route::get('/{any}', function(){
    return view('index');
})->where('any', '.*');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
