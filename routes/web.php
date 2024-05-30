<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\ChartController;

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
Route::get('/weight-and-meals', [CalendarController::class, 'show']);
