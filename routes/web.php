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

//Welcome page
Route::get('/', function () {return view('welcome');})->name('welcome');

// Guests only
Route::middleware(['guest'])->group(function() {
    Route::get('/register', [UserController::class, 'show_register']);
    Route::post('/register', [UserController::class, 'store_register']);
});


Route::get('/login', [UserController::class, 'show_login'])->name('login');
Route::post('/login', [UserController::class, 'store_login']);
Route::get('/logout', [UserController::class, 'logout']);


//Signed in users only
Route::middleware('auth')->group(function() {

    Route::get('/dashboard', [UserController::class, 'show_dashboard']);

    //Permissions
        {
            Route::get('/permissions', [UserController::class, 'show_permissions']);

            Route::get('/permissions/create', [UserController::class, 'create_permission']);
            Route::post('/permissions/create', [UserController::class, 'save_created_permission']);

            Route::post('/permissions/update/{permission}', [UserController::class, 'update_permission']);
            Route::post('/permissions/update/{permission}/save', [UserController::class, 'save_updated_permission']);

            Route::post('/permission/delete/{permission}', [UserController::class, 'delete_permission']);
        }


    //Roles
        {
            Route::get('/roles', [UserController::class, 'show_roles']);//->middleware('can:adminsOnlyAuthorization, role');;

            Route::get('/roles/create', [UserController::class, 'create_role']);
            Route::post('/roles/create', [UserController::class, 'save_created_role']);

            Route::post('/roles/update/{role}', [UserController::class, 'update_role']);
            Route::post('/roles/update', [UserController::class, 'save_updated_role']);

            Route::get('/roles/update/permissions', [UserController::class, 'show_role_permissions']);
            Route::post('/roles/update/permissions/save', [UserController::class, 'save_role_permissions']);

            Route::post('/roles/delete/{role}', [UserController::class, 'delete_role']);
        }


    //User
        {
            Route::get('/user/create', [UserController::class, 'create_new_user']);
            Route::post('/user/create', [UserController::class, 'save_created_user']);

            Route::post('/user/roles/{user}', [UserController::class, 'show_user_roles']);
            Route::post('/user/roles/{user}/save', [UserController::class, 'save_user_roles']);

            Route::post('user/delete/{user}', [UserController::class, 'delete_user']);
        }


});


    

