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

Route::get('/admin',[App\Http\Controllers\PizzaController::class, 'list']);
Route::get('/admin-create',[App\Http\Controllers\PizzaController::class, 'create']);
Route::get('/admin-delete/{id}',[App\Http\Controllers\PizzaController::class, 'delete'])->name('delete');

Route::get('/{any}', function(){
    return view('index');
})->where('any', '.*');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
