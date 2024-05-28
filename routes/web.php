<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\Admin\UsersController;

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

// Middleware
Route::group(['middleware' => 'auth'], function(){
    Route::get('/weight_and_meals/today', [HomeController::class, 'weight_and_meals'])->name('weight_and_meals');
    Route::get('/what-is-bmi', [HomeController::class, 'what_is_bmi'])->name('what-is-bmi');

    ### ADMIN
    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function(){
        #USERS
        Route::get('/users', [UsersController::class, 'index'])->name('users');
        Route::delete('/users/{id}/deactivate', [UsersController::class, 'deactivate'])->name('users.deactivate');
        Route::patch('/users/{id}/activate', [UsersController::class, 'activate'])->name('users.activate');
        Route::delete('/user/{id}/destroy', [UsersController::class, 'destroy'])->name('users.destroy');

    });
});
