<?php

use App\Http\Controllers\LTR\Dashboard\DashBoardController;
use App\Http\Controllers\LTR\Dashboard\MyCarsController;
use App\Http\Controllers\LTR\Dashboard\ProfileController;
use App\Http\Controllers\LTR\Dashboard\ParticularCarsController;
use App\Http\Controllers\LTR\Dashboard\CarDetailsController;
use Illuminate\Support\Facades\Route;

Route::prefix('/dashboard')->group(function () {

    Route::get('', [DashBoardController::class, 'show'])
    ->middleware(['auth'])
    ->name('dashboard');

    Route::get('/my_cars', [MyCarsController::class, 'show'])
    ->middleware(['auth'])
    ->name('mycars');

    Route::get('/profile', [ProfileController::class, 'show'])
    ->middleware(['auth'])
    ->name('profile');

    Route::post('/profile', [ProfileController::class, 'store'])
    ->middleware(['auth'])
    ->name('profile');

    Route::get('/particular', [ParticularCarsController::class, 'show'])
    ->middleware(['auth'])
    ->name('particular_cars');

    Route::get('/car/{slug?}', [CarDetailsController::class, 'show'])
    ->middleware(['auth'])
    ->name('dash_car');

    Route::post('/car/{slug?}', [CarDetailsController::class, 'store'])
    ->middleware(['auth'])
    ->name('dash_car');

});
