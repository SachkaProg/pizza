<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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


Auth::routes();


Route::get('/get-api-token', [\App\Http\Controllers\ApiTokenController::class, 'update'])->middleware('auth');


Route::get('/admin', [App\Http\Controllers\PizzaController::class, 'list'] )->name('pizzaList');
Route::get('/pizza/update/{id}', [App\Http\Controllers\PizzaController::class, 'update'] )->name('pizzaUpdate');
Route::get('/pizza/delete/{id}', [App\Http\Controllers\PizzaController::class, 'delete'] )->name('pizzaDelete');
Route::get('/pizza/update/components/{id}', [App\Http\Controllers\PizzaController::class, 'updateComponents'] )->name('pizzaUpdateComponents');
Route::post('/pizza/update/components/post', [App\Http\Controllers\PizzaController::class, 'updateComponentsPost'] )->name('pizzaUpdateComponentsPost');


Route::get('/goods/list', [App\Http\Controllers\GoodsController::class, 'list'] )->name('goodsList');
Route::get('/goods/create', [App\Http\Controllers\GoodsController::class, 'create'] )->name('goodscreate');
Route::post('/goods/create/post', [App\Http\Controllers\GoodsController::class, 'createPost'] )->name('goodscreatePost');
Route::get('/goods/update/{id}', [App\Http\Controllers\GoodsController::class, 'update'] )->name('goodupdate');
Route::post('/goods/update/post', [App\Http\Controllers\GoodsController::class, 'updatePost'] )->name('goodupdatePost');
Route::get('/goods/delete/{id}', [App\Http\Controllers\GoodsController::class, 'delete'] )->name('goodDelete');



// Соуса
Route::get('/souces/list', [App\Http\Controllers\SoucesController::class, 'list'] )->name('soucesList');
Route::get('/souces/create', [App\Http\Controllers\SoucesController::class, 'create'] )->name('soucescreate');
Route::post('/souces/create/post', [App\Http\Controllers\SoucesController::class, 'createPost'] )->name('soucescreatePost');
Route::get('/souces/update/{id}', [App\Http\Controllers\SoucesController::class, 'update'] )->name('soucesUpdate');
Route::post('/souces/update/post', [App\Http\Controllers\SoucesController::class, 'updatePost'] )->name('soucesupdatePost');
Route::get('/souces/delete/{id}', [App\Http\Controllers\SoucesController::class, 'delete'] )->name('soucesDelete');


// Добавки
Route::get('/add/list', [App\Http\Controllers\AdditionController::class, 'list'] )->name('addList');
Route::get('/add/create', [App\Http\Controllers\AdditionController::class, 'create'] )->name('addcreate');
Route::post('/add/create/post', [App\Http\Controllers\AdditionController::class, 'createPost'] )->name('addcreatePost');
Route::get('/add/update/{id}', [App\Http\Controllers\AdditionController::class, 'update'] )->name('addUpdate');
Route::post('/add/update/post', [App\Http\Controllers\AdditionController::class, 'updatePost'] )->name('addupdatePost');
Route::get('/add/delete/{id}', [App\Http\Controllers\AdditionController::class, 'delete'] )->name('addDelete');



Route::get('/category/list', [App\Http\Controllers\CategoryController::class, 'list'] )->name('categoryList');;
Route::get('/category/delete/{id}', [App\Http\Controllers\CategoryController::class, 'delete'] )->name('categoryDelete');
Route::get('/category/create', [App\Http\Controllers\CategoryController::class, 'create'] )->name('categoryCreate');
Route::post('/category/create/post', [App\Http\Controllers\CategoryController::class, 'createPost'] )->name('categoryCreatePost');
Route::get('/category/update/{$id}', [App\Http\Controllers\CategoryController::class, 'update'] )->name('categoryUpdate');
Route::post('/category/update/post', [App\Http\Controllers\CategoryController::class, 'updatePost'] )->name('categoryUpdatePost');

Route::get('/{any}', function(){
    return view('index');
})->where('any', '.*');



// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
