<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\WeightController;
use App\Http\Controllers\MealController;
use App\Http\Controllers\PostController;


use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\CommunitiesController;

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

// Middleware
Route::group(['middleware' => 'auth'], function(){
    Route::get('/weight_and_meals/today', [CalendarController::class, 'show'])->name('meal.today');

    // Route::get('/weight_and_meals/today/create', [MealController::class, 'create'])->name('meal.today');
    Route::post('/weight_and_meals/today/meal_store', [MealController::class, 'store'])->name('meal.store');

    
    Route::post('/weight_and_meals/today/weight_store', [WeightController::class, 'store'])->name('weight.store');




    Route::get('/what-is-bmi', [HomeController::class, 'what_is_bmi'])->name('what-is-bmi');

    ### COMMUNITY
    Route::get('/community/top', [HomeController::class, 'community'])->name('community');
    Route::get('/community/{id}/all_posts', [PostController::class, 'community_all_posts'])->name('community_all_posts');

    ### POST
    // Route::get('/post/create', [PostController::class, 'create'])->name('post.create');
    Route::post('/post/{id}/store', [PostController::class, 'store'])->name('post.store');
    Route::get('/post/{id}/show', [PostController::class, 'show'])->name('post.show');
    Route::get('/post/{id}/edit', [PostController::class, 'edit'])->name('post.edit');
    Route::patch('/post/{id}/update', [PostController::class, 'update'])->name('post.update');
    Route::delete('/post/{id}/destroy', [PostController::class, 'destroy'])->name('post.destroy');

    // minami-san code
//     Route::get('/community-all-posts', function(){
//         return view('community.community-all-posts');
//    });
   
   Route::get('/create-new-posts', function(){
       return view('community.modals.create-new-posts');
   });
   
   Route::get('/edit', function(){
       return view('community.modals.edit');
   });
   
   Route::get('/delete', function(){
       return view('community.modals.delete');
   });


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




