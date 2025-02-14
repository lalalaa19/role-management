<?php

use App\Http\Controllers\RoleController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::resource('roles', RoleController::class);

Route::match(['get', 'post'], '/register', [AuthController::class, 'register'])->name('auth.register');
Route::match(['get', 'post'], '/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout'); // Use POST for logout
