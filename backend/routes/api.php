<?php

use App\Http\Controllers\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;

Route::group(['prefix' => 'v1'], function () {
    Route::post('/login', [LoginController::class, 'login'])->name('LoginController.login');

    Route::middleware(('auth:sanctum'))->group(function () {
        Route::get('/my-page', [UsersController::class])->name('UsersController.show');
    });
    Route::get('/user', [UsersController::class, 'index'])->name('UsersController.index');
});
