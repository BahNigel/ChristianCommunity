<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\RegisterController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\DashBordController;



Route::post('admin/register', [RegisterController::class, 'register'])->name('admin.register');
Route::post('admin/login', [LoginController::class, 'login'])->name('admin.login');
Route::post('admin/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum')->name('admin.logout');
Route::get('admin/register', [RegisterController::class, 'view'])->name('view.register');
Route::get('admin/login', [LoginController::class, 'view'])->name('view.login');
Route::get('admin/dashboard', [DashBordController::class, 'view'])->name('admin.dashboard');