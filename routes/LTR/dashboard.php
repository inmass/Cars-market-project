<?php

use App\Http\Controllers\LTR\Dashboard\DashBoardController;
use App\Http\Controllers\LTR\Dashboard\MyCarsController;
use App\Http\Controllers\LTR\Dashboard\ProfileController;
use App\Http\Controllers\LTR\Dashboard\ParticularCarsController;
use App\Http\Controllers\LTR\Dashboard\CarDetailsController;
use App\Http\Controllers\LTR\Dashboard\AddCarController;
use App\Http\Controllers\LTR\Dashboard\SubscriptionController;
use App\Http\Controllers\LTR\Dashboard\MessagesController;
use App\Http\Controllers\LTR\Dashboard\GaragesController;
use App\Http\Controllers\LTR\Dashboard\GarageDetailsController;
use App\Http\Controllers\LTR\Dashboard\AddGarageController;
use Illuminate\Support\Facades\Route;

Route::prefix('/dashboard')->middleware(['auth', 'normaluser'])->group(function () {

    Route::get('', [DashBoardController::class, 'show'])
    ->name('dashboard');

    Route::get('/my_cars', [MyCarsController::class, 'show'])
    ->name('mycars');

    Route::get('/profile', [ProfileController::class, 'show'])
    ->name('profile');

    Route::post('/profile', [ProfileController::class, 'store']);

    Route::get('/particular', [ParticularCarsController::class, 'show'])
    ->name('particular_cars');

    Route::get('/car/{slug?}', [CarDetailsController::class, 'show'])
    ->name('dash_car');

    Route::post('/car/{slug?}', [CarDetailsController::class, 'store']);

    Route::get('/add_car', [AddCarController::class, 'show'])
    ->name('add_car');

    Route::post('/add_car', [AddCarController::class, 'store']);

    Route::get('/subscription', [SubscriptionController::class, 'show'])
    ->name('manage_sub');

    Route::get('/messages', [MessagesController::class, 'show'])
    ->name('garage_messages');

    Route::get('/messages/{slug?}', [MessagesController::class, 'show_single']);

});

Route::prefix('/admin')->middleware(['auth', 'superuser'])->group(function () {

    Route::get('', [DashBoardController::class, 'show'])
    ->name('super_dashboard');

    Route::get('/garages', [GaragesController::class, 'show'])
    ->name('garages_list');

    Route::get('/garage/{slug?}', [GarageDetailsController::class, 'show'])
    ->name('garage_details');

    Route::post('/garage/{slug}', [GarageDetailsController::class, 'store']);

    Route::get('/add_garage', [AddGarageController::class, 'show'])
    ->name('add_garage');

    Route::post('/add_garage', [AddGarageController::class, 'store']);

    Route::get('/particular', [ParticularCarsController::class, 'admin_show'])
    ->name('admin_particular_cars');

    Route::get('/car/{slug?}', [CarDetailsController::class, 'show'])
    ->name('admin_dash_car');

    Route::post('/car/{slug?}', [CarDetailsController::class, 'store']);

    Route::get('/add_car/{slug}', [AddCarController::class, 'admin_show'])
    ->name('admin_add_car');

    Route::post('/add_car/{slug}', [AddCarController::class, 'admin_store']);
});
