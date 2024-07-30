<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\ProductController;
use App\Http\Controllers\TinController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SPController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\AuthController;
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

// Route::get('/danh-sach-san-pham', function () {
//     echo 'dit me';
//     // Route::get("","");
// });

// Route::get('/', function () {
//     echo 'bao luc';
//     // Route::get("","");
// });

// //list Product

// Route::get('list-product', [ProductController::class, 'showProduct']);

// //slug 

// Route::get('get-product/{id}', [ProductController::class,'getProduct']);

// // Params

// Route::get('update-product', [ProductController::class,'updateProduct']);

// //list sinhvien
// Route::get('list-sv', [TinController::class, 'thongtinsv']);

// // CRUD -> query builder
// Route::group([
//     'prefix' => 'users',
//     'as' => 'users.'
// ], function () {
//     // http://127.0.0.1:8000/users/list-users
//     Route::get('list-users', [UserController::class, 'listUsers'])
//     ->name('listUsers');

//     // http://127.0.0.1:8000/users/add-users
//     Route::get('add-users', [UserController::class, 'addUsers'])
//     ->name('add');

//     Route::post('add-users', [UserController::class, 'addPostUsers'])
//     ->name('addPostUsers');


//     Route::get('delete-users/{userId}', [UserController::class, 'deleteUser'])
//     ->name('deleteUser');


//     Route::get('update-users/{userId}', [UserController::class, 'updateUser'])
//     ->name('updateUser');

//     Route::post('update-users', [UserController::class, 'updatePostUsers'])
//     ->name('updatePostUsers');

// });

// Route::group([
//     'prefix' => 'products',
//     'as' => 'products.'
// ], function () {
//     // http://127.0.0.1:8000/users/list-users
//     Route::get('list-products', [SPController::class, 'listProducts'])
//     ->name('listProducts');

//     // http://127.0.0.1:8000/users/add-users
//     Route::get('add-products', [SPController::class, 'addProducts'])
//     ->name('add');

//     Route::post('add-products', [SPController::class, 'addPostProducts'])
//     ->name('addPostProducts');


//     Route::get('delete-products/{productId}', [SPController::class, 'deleteProducts'])
//     ->name('deleteProducts');


//     Route::get('update-products/{productId}', [SPController::class, 'updateProducts'])
//     ->name('updateProducts');

//     Route::post('update-products', [SPController::class, 'updatePostProducts'])
//     ->name('updatePostProducts');
// });

Route::get('login', [AuthController::class, 'login'])
        ->name('login');

Route::post('login', [AuthController::class, 'postLogin'])
        ->name('postLogin');

Route::get('logout', [AuthController::class, 'logout'])
        ->name('logout');

Route::get('register', [AuthController::class, 'register'])
        ->name('register');

Route::post('register', [AuthController::class, 'postRegister'])
        ->name('postRegister');

Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'middleware' => 'checkAdmin'
], function () {

    Route::group([
        'prefix' => 'products',
        'as' => 'products.'
    ], function () {
        Route::get('/', [ProductController::class, 'listProduct'])
        ->name('listProduct');

        // .../admin/products/add-product
        Route::get('/add-product', [ProductController::class, 'addProduct'])
        ->name('addProduct');

        Route::post('/add-product', [ProductController::class, 'addPostProduct'])
        ->name('addPostProduct');

        Route::delete('delete-product/{idPd}', [ProductController::class,'deleteProduct'])->name('deleteProduct');
        
        Route::get('/update-product/{idPd}', [ProductController::class, 'updateProduct'])
        ->name('updateProduct');

        Route::patch('/update-product/{idPd}', [ProductController::class, 'updatePostProduct'])
        ->name('updatePostProduct');
    });
});

