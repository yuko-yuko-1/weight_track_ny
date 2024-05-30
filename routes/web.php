<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\CommunitiesController;

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

// Middleware
Route::group(['middleware' => 'auth'], function(){
    Route::get('/weight_and_meals/today', [HomeController::class, 'weight_and_meals'])->name('weight_and_meals');
    Route::get('/what-is-bmi', [HomeController::class, 'what_is_bmi'])->name('what-is-bmi');

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

Route::get('/create-new-posts', function(){
    return view('community.modals.create-new-posts');
});

Route::get('/edit', function(){
    return view('community.modals.edit');
});

// Route::get('/delete', function(){
//     return view('community.modals.delete');
// });




