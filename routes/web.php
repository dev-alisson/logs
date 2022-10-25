<?php

use Illuminate\Support\Facades\Route;

/**
 * Controllers
 */

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogController;

/**
 * Guest
 */
Route::group(['middleware' => ['guest']], function () {
    /**
     * Auth
     */
    Route::get('/', [AuthController::class, 'index'])->name('auth.index');
    Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
    Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');
    Route::get('/register', [AuthController::class, 'create'])->name('auth.create');
    Route::post('/register', [AuthController::class, 'register'])->name('auth.register');
    Route::get('/remember', [AuthController::class, 'remember'])->name('auth.remember');
});

/**
 * Authenticated
 */
Route::group(['middleware' => ['auth']], function () {
    /**
     * Auth
     */
    Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');

    /**
     * Dashboard
     */
    Route::get('/admin', [HomeController::class, 'index'])->name('dashboard.index');
    Route::get('/admin/sales', [HomeController::class, 'sales'])->name('dashboard.sales');

    /**
     * Users
     */
    Route::get('/admin/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/admin/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/admin/users/store', [UserController::class, 'store'])->name('users.store');
    Route::get('/admin/users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/admin/users/update/{id}', [UserController::class, 'update'])->name('users.update');
    Route::post('/admin/users/destroy/{id}', [UserController::class, 'destroy'])->name('users.destroy');

    /**
     * Logs
     */
    Route::get('/admin/logs', [LogController::class, 'index'])->name('logs.index');
    Route::get('/admin/logs/create', [LogController::class, 'create'])->name('logs.create');
    Route::post('/admin/logs/store', [LogController::class, 'store'])->name('logs.store');
    Route::get('/admin/logs/edit/{id}', [LogController::class, 'edit'])->name('logs.edit');
    Route::put('/admin/logs/update/{id}', [LogController::class, 'update'])->name('logs.update');
    Route::post('/admin/logs/destroy/{id}', [LogController::class, 'destroy'])->name('logs.destroy');
    Route::post('/admin/logs/clear', [LogController::class, 'clear'])->name('logs.clear');
});
