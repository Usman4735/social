<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\SuperAdmin\AdminController;
use App\Http\Controllers\SuperAdmin\ProductCategoryController;
use App\Http\Controllers\SuperAdmin\UserController;

// Super Admin Routes
Route::prefix('sa1991as')->group(function() {
    Route::get('/', [AdminController::class, "index"]);
    Route::post('/', [AdminController::class, "loginProcess"]);
    Route::get('logout', [AdminController::class, "logout"]);

    // Product Categories
    Route::resource('product-categories', ProductCategoryController::class);

    // User Management
    Route::resource('user-management', UserController::class);

});

// ----------------------------------------------------------------------------------------------------

// Front Routes
Route::prefix('/')->group(function() {
    Route::get('/', [HomeController::class, "index"]);
    // Register
    Route::get('register', [HomeController::class, "register"]);
    Route::post('register', [HomeController::class, "registerProcess"]);
    // Login
    Route::get('login', [HomeController::class, "login"]);
    Route::post('login', [HomeController::class, "loginProcess"]);
    Route::get('logout', [HomeController::class, "logout"]);
});
