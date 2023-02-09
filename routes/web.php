<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdmin\AdminController;
use App\Http\Controllers\Front\HomeController;

// Super Admin Routes
Route::prefix('sa1991as')->group(function() {
    Route::get('/', [AdminController::class, "index"]);
    Route::post('/', [AdminController::class, "registerProcess"]);
    Route::get('logout', [AdminController::class, "logout"]);
});

// Front Routes
Route::prefix('/')->group(function() {
    Route::get('/', [HomeController::class, "index"]);
    Route::get('register', [HomeController::class, "register"]);
});
