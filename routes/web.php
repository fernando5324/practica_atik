<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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

Route::get('/index', [ProductController::class, 'index'])->name('index.product');

Route::get('/create/{id}', [ProductController::class, 'create'])->name('create.product');


Route::post('/product/save', [ProductController::class, 'save'])->name('save.product');
Route::post('/product/delete/{id}', [ProductController::class, 'delete'])->name('delete.product');