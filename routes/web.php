<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

Route::get('/what-is-bmi', function () {
    return view('what-is-bmi');
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




