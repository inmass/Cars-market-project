<?php

use App\Http\Controllers\LTR\Dashboard\DashBoardController;
use Illuminate\Support\Facades\Route;

Route::prefix('/dashboard')->group(function () {
    Route::get('', [DashBoardController::class, 'show'])
    ->middleware(['auth'])
    ->name('dashboard');
});
