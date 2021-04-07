<?php

use App\Http\Controllers\Dashboard\HomeController;
use Illuminate\Support\Facades\Route;

Route::prefix('/mydashboard')->group(function () {
    Route::get('', [HomeController::class, 'show'])->name('dashboard_home');
});
