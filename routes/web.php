<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TinController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SPController;
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

// CRUD -> query builder
Route::group([
    'prefix' => 'users',
    'as' => 'users.'
], function () {
    // http://127.0.0.1:8000/users/list-users
    Route::get('list-users', [UserController::class, 'listUsers'])
    ->name('listUsers');

    // http://127.0.0.1:8000/users/add-users
    Route::get('add-users', [UserController::class, 'addUsers'])
    ->name('add');

    Route::post('add-users', [UserController::class, 'addPostUsers'])
    ->name('addPostUsers');


    Route::get('delete-users/{userId}', [UserController::class, 'deleteUser'])
    ->name('deleteUser');


    Route::get('update-users/{userId}', [UserController::class, 'updateUser'])
    ->name('updateUser');

    Route::post('update-users', [UserController::class, 'updatePostUsers'])
    ->name('updatePostUsers');

});

Route::group([
    'prefix' => 'products',
    'as' => 'products.'
], function () {
    // http://127.0.0.1:8000/users/list-users
    Route::get('list-products', [SPController::class, 'listProducts'])
    ->name('listProducts');

    // http://127.0.0.1:8000/users/add-users
    Route::get('add-products', [SPController::class, 'addProducts'])
    ->name('add');

    Route::post('add-products', [SPController::class, 'addPostProducts'])
    ->name('addPostProducts');


    Route::get('delete-products/{productId}', [SPController::class, 'deleteProducts'])
    ->name('deleteProducts');


    Route::get('update-products/{productId}', [SPController::class, 'updateProducts'])
    ->name('updateProducts');

    Route::post('update-products', [SPController::class, 'updatePostProducts'])
    ->name('updatePostProducts');
});