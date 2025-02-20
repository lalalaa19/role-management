<?php

use App\Http\Controllers\RoleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ActionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
// Role
Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
Route::match(['get', 'post'], '/roles/addRole', [RoleController::class, 'addRole'])->name('roles.addRole');
Route::match(['get', 'put'], '/roles/editRole/index', [RoleController::class, 'editRole'])->name('roles.editRole');
Route::get('/roles/viewRole/index', [RoleController::class, 'viewRole'])->name('roles.viewRole');
Route::delete('/roles/deleteRole/index', [RoleController::class, 'deleteRole'])->name('roles.deleteRole');



// Action
Route::get('/actions', [ActionController::class, 'index'])->name('actions.index');
Route::match(['get', 'post'], '/actions/addAction', [ActionController::class, 'addAction'])->name('actions.addAction');
Route::match(['get', 'post'], '/actions/editAction/index', [ActionController::class, 'editAction'])->name('actions.editAction');
Route::get('/actions/viewAction/index', [ActionController::class, 'viewAction'])->name('actions.viewAction');
Route::delete('/actions/deleteAction/index', [ActionController::class, 'deleteAction'])->name('actions.deleteAction');


Route::resource('users', UserController::class);

// Route::get('/register', [AuthController::class, 'register'])->name('register');
// Route::post('/register', [AuthController::class, 'register']);
// Route::get('/auth-register', [AuthController::class, 'register'])->name('auth.register');
// Route::match(['get', 'post'], '/login', [AuthController::class, 'login'])->name('login');
// Route::post('/logout', [AuthController::class, 'logout'])->name('logout');