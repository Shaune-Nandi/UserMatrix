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
})->name('welcome');

Route::get('/login', [UserController::class, 'show_login'])->name('login');
Route::post('/login', [UserController::class, 'store_login']);

Route::middleware(['guest'])->group(function() {
    Route::get('/register', [UserController::class, 'show_register']);
    Route::post('/register', [UserController::class, 'store_register']);
});

Route::middleware('auth')->group(function() {

    Route::get('/permissions', [UserController::class, 'show_permissions']);

    Route::get('/permissions/create', [UserController::class, 'create_permission']);
    Route::post('/permissions/create', [UserController::class, 'save_created_permission']);
    

    Route::get('/dashboard', [UserController::class, 'show_dashboard']);

    Route::get('/logout', [UserController::class, 'logout']);

    Route::get('/roles', [UserController::class, 'show_roles']);

    Route::get('/roles/create', [UserController::class, 'create_role']);
    Route::post('/roles/create', [UserController::class, 'save_created_role']);

});


    

