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


// User
Route::get('users', [UserController::class, 'index'])->name('users.index');
Route::match(['get', 'post'], '/users/addUser', [UserController::class, 'addUser'])->name('users.addUser');
Route::get('users/viewUser/index', [UserController::class, 'viewUser'])->name('users.viewUser');
Route::match(['get', 'post'], 'users/editUser/index', [UserController::class, 'editUser'])->name('users.editUser');
Route::post('users/deleteUser', [UserController::class, 'deleteUser'])->name('users.deleteUser');

// Route::get('/register', [AuthController::class, 'register'])->name('register');
// Route::post('/register', [AuthController::class, 'register']);
// Route::get('/auth-register', [AuthController::class, 'register'])->name('auth.register');
// Route::match(['get', 'post'], '/login', [AuthController::class, 'login'])->name('login');
// Route::post('/logout', [AuthController::class, 'logout'])->name('logout');