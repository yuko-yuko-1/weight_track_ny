<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LogWeightHistoryController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\WeightController;
use App\Http\Controllers\MealController;


use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\CommunitiesController;

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

// Middleware
Route::group(['middleware' => 'auth'], function(){
    Route::get('/weight_and_meals/today', [CalendarController::class, 'show'])->name('meal.today');

    // Route::get('/weight_and_meals/today/create', [MealController::class, 'create'])->name('meal.today');
    Route::post('/weight_and_meals/today/meal_store', [MealController::class, 'store'])->name('meal.store');
    Route::delete('/weight_and_meals/today/meal_destroy/{id}', [MealController::class, 'destroy'])->name('meal.destroy');



    Route::post('/weight_and_meals/today/weight_store', [WeightController::class, 'store'])->name('weight.store');




    Route::get('/what-is-bmi', [HomeController::class, 'what_is_bmi'])->name('what-is-bmi');



   #Profile
    Route::get('/profile/{id}/show',[ProfileController::class,'show'])->name('profile-main');
    Route::get('/profile/edit',[ProfileController::class,'edit'])->name('profile-edit');
    Route::patch('/profile/update',[ProfileController::class,'update'])->name('profile-update');
    Route::delete('/profile/{id}/delete', [ProfileController::class, 'destroy'])->name('profile-destroy');

    // Profile Log weight history
    Route::get('/log-weight-history/{id}/show', [LogWeightHistoryController::class,'show'])->name('log-weight-history');

    Route::get('/community/top', [HomeController::class, 'community'])->name('community');

    ### ADMIN
    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function(){
        #USERS
        Route::get('/users', [UsersController::class, 'index'])->name('users');
        Route::delete('/users/{id}/deactivate', [UsersController::class, 'deactivate'])->name('users.deactivate');
        Route::patch('/users/{id}/activate', [UsersController::class, 'activate'])->name('users.activate');
        Route::delete('/user/{id}/destroy', [UsersController::class, 'destroy'])->name('users.destroy');
        #COMMUNIIES
        Route::get('/communities', [CommunitiesController::class, 'index'])->name('communities');
        Route::post('/categproes/store', [CommunitiesController::class, 'store'])->name('communities.store');
        Route::patch('/communities/{id}/update', [CommunitiesController::class, 'update'])->name('communities.update');
        Route::delete('/communities/{id}/destroy', [CommunitiesController::class, 'destroy'])->name('communities.destroy');
    });
});

Route::get('/community-all-posts', function(){
     return view('community.community-all-posts');
});

Route::get('/show-post', function(){
    return view('community.post.contents.show-post');
});

Route::get('/create-new-posts', function(){
    return view('community.modals.create-new-posts');
});

Route::get('/edit', function(){
    return view('community.modals.edit');
});

// Route::get('/delete', function(){
//     return view('community.modals.delete');
// });


