<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::get('/dashboard', [UserController::class, 'show_dashboard']);


Route::get('/register', [UserController::class, 'show_register']);
Route::post('/register', [UserController::class, 'store_register']);

Route::get('/login', [UserController::class, 'show_login']);
Route::post('/login', [UserController::class, 'store_login']);

Route::get('/logout', [UserController::class, 'logout']);



