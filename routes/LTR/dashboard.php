<?php

use App\Http\Controllers\LTR\Dashboard\DashBoardController;
use App\Http\Controllers\LTR\Dashboard\MyCarsController;
use App\Http\Controllers\LTR\Dashboard\ProfileController;
use App\Http\Controllers\LTR\Dashboard\ParticularCarsController;
use App\Http\Controllers\LTR\Dashboard\CarDetailsController;
use App\Http\Controllers\LTR\Dashboard\AddCarController;
use App\Http\Controllers\LTR\Dashboard\SubscriptionController;
use App\Http\Controllers\LTR\Dashboard\MessagesController;
use Illuminate\Support\Facades\Route;

Route::prefix('/dashboard')->middleware(['auth'])->group(function () {

    Route::get('', [DashBoardController::class, 'show'])
    ->name('dashboard');

    Route::get('/my_cars', [MyCarsController::class, 'show'])
    ->middleware(['normaluser'])
    ->name('mycars');

    Route::get('/profile', [ProfileController::class, 'show'])
    ->middleware(['normaluser'])
    ->name('profile');

    Route::post('/profile', [ProfileController::class, 'store']);

    Route::get('/particular', [ParticularCarsController::class, 'show'])
    ->name('particular_cars');

    Route::get('/car/{slug?}', [CarDetailsController::class, 'show'])
    ->name('dash_car');

    Route::post('/car/{slug?}', [CarDetailsController::class, 'store']);

    Route::get('/add_car', [AddCarController::class, 'show'])
    ->middleware(['normaluser'])
    ->name('add_car');

    Route::post('/add_car', [AddCarController::class, 'store']);

    Route::get('/subscription', [SubscriptionController::class, 'show'])
    ->middleware(['normaluser'])
    ->name('manage_sub');

    Route::get('/messages', [MessagesController::class, 'show'])
    ->middleware(['normaluser'])
    ->name('garage_messages');

});
