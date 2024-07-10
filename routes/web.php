<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/list-user', [UserController::class, 'showUser']);
Route::get('/get-user/{id}/{name?}', [UserController::class, 'getUser']);
Route::get('/update-user', [UserController::class, 'updateUser']);
Route::get('/thong-tin-sv', [UserController::class, 'showSv']);


Route::group(['prefix' => 'users',  'as' => 'users.'], function () {
    Route::get('list-users', [UserController::class, 'listUsers'])->name('listUsers');
    Route::get('add-users', [UserController::class, 'addUsers'])->name('addUsers');
    Route::post('add-users', [UserController::class, 'addPostUsers'])->name('addPostUsers');
    Route::get('delete-users/{userId}', [UserController::class, 'deleteUsers'])->name('deleteUsers');
    Route::get('update-users/{userId}', [UserController::class, 'updateUsers'])->name('updateUsers');
    Route::post('update-users', [UserController::class, 'updatePostUsers'])->name('updatePostUsers');
});

Route::group(['prefix' => 'product', 'as' => 'product.'], function() {
    Route::get('list-product', [ProductController::class, 'listProduct'])->name('listProduct');
    Route::get('add-product', [ProductController::class, 'addProduct'])->name('addProduct');
    Route::post('add-product', [ProductController::class, 'addPostProduct'])->name('addPostProduct');
    Route::get('delete-product/{proId}', [ProductController::class, 'deleteProduct'])->name('deleteProduct');
    Route::get('update-product/{proId}', [ProductController::class, 'updateProduct'])->name('updateProduct');
    Route::post('update-product', [ProductController::class, 'updatePostProduct'])->name('updatePostProduct');
    Route::get('search', [ProductController::class, 'search'])->name('search');
});