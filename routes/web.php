<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TinController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Wethod http
// GET, POST, PUT , PASH, DELETE

// Base url 
//http://127.0.0.1:8000

Route::get('/danh-sach-san-pham', function () {
    echo 'dit me';
    // Route::get("","");
});

Route::get('/', function () {
    echo 'bao luc';
    // Route::get("","");
});

//list Product

Route::get('list-product', [ProductController::class, 'showProduct']);

//slug 

Route::get('get-product/{id}', [ProductController::class,'getProduct']);

// Params

Route::get('update-product', [ProductController::class,'updateProduct']);

//list sinhvien
Route::get('list-sv', [TinController::class, 'thongtinsv']);