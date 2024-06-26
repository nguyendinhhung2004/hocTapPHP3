<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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
