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
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserPostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;

use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\CommunitiesController;
use App\Http\Controllers\Admin\PostsController;

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

// Middleware
Route::group(['middleware' => 'auth'], function(){
    Route::get('/weight_and_meals/today', [CalendarController::class, 'show'])->name('meal.today');
    Route::get('/meals/{year}/{month}/{day}', [CalendarController::class, 'getMealByDate']);



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
    Route::get('/log-weight-history/{id}/edit', [LogWeightHistoryController::class, 'edit'])->name('weight-edit');
    Route::patch('/log-weight-history/{id}/update', [LogWeightHistoryController::class, 'update'])->name('weight-update');
    Route::delete('/log-weight-history/{id}/delete', [LogWeightHistoryController::class, 'destroy'])->name('weight-destroy');

    #Profile Your Posts
    Route::get('/profile-post/{id}/show',[UserPostController::class,'show'])->name('profile-post');

    #Profile All Meal Posts
    Route::get('/profile-meal-posts/{id}/show',[MealController::class,'show'])->name('profile-meal-post');

    #Community
    Route::get('/community/top', [HomeController::class, 'community'])->name('community');
    Route::get('/community/search', [HomeController::class, 'community_search'])->name('community.search');
    Route::get('/community/{id}/all_posts', [PostController::class, 'community_all_posts'])->name('community_all_posts');
    Route::get('/community/post/{id}/show', [PostController::class, 'show'])->name('post.show');

    ### POST
    // Route::get('/post/create', [PostController::class, 'create'])->name('post.create');
    Route::post('/post/{id}/store', [PostController::class, 'store'])->name('post.store');
    // Route::get('/post/{id}/edit', [PostController::class, 'edit'])->name('post.edit');
    Route::patch('/post/{id}/update', [PostController::class, 'update'])->name('post.update');
    Route::delete('/post/{id}/destroy', [PostController::class, 'destroy'])->name('post.destroy');


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
        #POSTS
        Route::get('/posts', [PostsController::class, 'index'])->name('posts');
        Route::delete('/posts/{id}/hide', [PostsController::class, 'hide'])->name('posts.hide');
        Route::patch('/posts/{id}/unhide', [PostsController::class, 'unhide'])->name('posts.unhide');
        Route::delete('/post/{id}/destroy', [PostsController::class, 'destroy'])->name('posts.destroy');
    });
});

// Comment and Like for Show-post page

#comment
Route::post('/comment/store/{post_id}',[CommentController::class,'store'])->name('comment.store');
Route::patch('/comment/update/{comment_id}',[CommentController::class,'update'])->name('comment.update');
Route::delete('/comment/destroy/{comment_id}',[CommentController::class,'destroy'])->name('comment.destroy');

#Like
Route::post('/like/{post_id}/store',[LikeController::class,'store'])->name('like.store');
Route::delete('/like/{post_id}/delete',[LikeController::class,'destroy'])->name('like.delete');

Route::get('/post/{id}', [PostController::class, 'show'])->name('post.show');
