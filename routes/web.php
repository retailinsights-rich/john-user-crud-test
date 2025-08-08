<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdministratorController;
use App\Http\Controllers\UserController;

Route::get('/administrator/register-form', [AdministratorController::class, 'registerForm'])->name("administrator_register_form");
Route::post('/administrator/register', [AdministratorController::class, 'register'])->name("administrator_register");
Route::get('/administrator/login-form', [AdministratorController::class, 'loginForm'])->name("administrator_login_form");
Route::post('/administrator/login', [AdministratorController::class, 'login'])->name("administrator_login");
Route::get('/administrator/logout', [AdministratorController::class, 'logout'])->name("administrator_logout");

Route::get('/', [UserController::class, 'index'])->name("user_index");
Route::get('/user', [UserController::class, 'index'])->name("user_index");
Route::get('/user/index', [UserController::class, 'index'])->name("user_index");
Route::get('/user/create', [UserController::class, 'create'])->name("user_create");
Route::post('/user/store', [UserController::class, 'store'])->name("user_store");
Route::get('/user/{user}/update-form', [UserController::class, 'updateForm'])->name("user_update_form");
Route::post('/user/{user}/update', [UserController::class, 'update'])->name("user_update");
Route::get('/user/{user}/show', [UserController::class, 'show'])->name("user_show");
Route::post('/user/{user}/delete', [UserController::class, 'delete'])->name("user_delete");
