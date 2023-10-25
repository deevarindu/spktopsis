<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CriteriaController;
use App\Http\Controllers\CalculateController;
use App\Http\Controllers\AlternativeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::resource('/', CalculateController::class);

Route::resource('/criteria', CriteriaController::class);

Route::resource('/alternative', AlternativeController::class);

Route::resource('/profile', ProfileController::class);
