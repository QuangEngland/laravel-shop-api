<?php

use App\Http\Controllers\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ProductsController;

Route::group(['prefix' => 'v1'], function () {
    Route::post('/login', [LoginController::class, 'login'])->name('LoginController.login');

    Route::middleware(('auth:sanctum'))->group(function () {
        Route::post('/logout', [LoginController::class, 'logout'])->name('LoginController.logout');
        Route::get('/my-page', [UsersController::class])->name('UsersController.show');
        Route::get('/products/{id}', [ProductsController::class, 'show'])->name('ProductsController.show');
        Route::get('/products', [ProductsController::class, 'index'])->name('ProductsController.index');
    });
    Route::middleware(['auth:sanctum', 'role:admin'])->group(function () {
        Route::post('/products', [ProductsController::class, 'store'])->name('ProductsController.store');
        Route::put('/products/{id}', [ProductsController::class, 'update'])->name('ProductsController.update');
        Route::delete('/products/{id}', [ProductsController::class, 'destroy'])->name('ProductsController.destroy');
    });
    Route::get('/user', [UsersController::class, 'index'])->name('UsersController.index');
});
