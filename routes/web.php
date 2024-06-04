<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LogWeightHistoryController;

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

// Middleware
Route::group(['middleware' => 'auth'], function(){
    Route::get('/weight_and_meals/today', [HomeController::class, 'weight_and_meals'])->name('weight_and_meals');
    Route::get('/what-is-bmi', [HomeController::class, 'what_is_bmi'])->name('what-is-bmi');
    // Route::get('/profile/logweight-history', [HomeController::class, 'logweight_history'])->name('logweight-history');
    // Route::get('/profile/all-meal-posts', [HomeController::class, 'all_meal_posts'])->name('all-meal-posts');
    // Route::get('/profile/all-your-posts', [HomeController::class, 'all_your_posts'])->name('all-your-posts');
});


 #Profile
    Route::get('/profile/{id}/show',[ProfileController::class,'show'])->name('profile-main');
    Route::get('/profile/edit',[ProfileController::class,'edit'])->name('profile-edit');
    Route::patch('/profile/update',[ProfileController::class,'update'])->name('profile-update');
    Route::delete('/profile/{id}/delete', [ProfileController::class, 'destroy'])->name('profile-destroy');

    // profile Log weight history
    Route::get('/log-weight-history/{id}/show', [LogWeightHistoryController::class,'show'])->name('log-weight-history');
