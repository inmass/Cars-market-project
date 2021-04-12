<?php

use App\Http\Controllers\LTR\Dashboard\DashBoardController;
use App\Http\Controllers\LTR\Dashboard\MyCarsController;
use Illuminate\Support\Facades\Route;

Route::prefix('/dashboard')->group(function () {

    Route::get('', [DashBoardController::class, 'show'])
    ->middleware(['auth'])
    ->name('dashboard');

    Route::get('/my_cars', [MyCarsController::class, 'show'])
    ->middleware(['auth'])
    ->name('mycars');

});
