<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\SuperAdmin\AdminController;
use App\Http\Controllers\SuperAdmin\ProductCategoryController;

// Super Admin Routes
Route::prefix('sa1991as')->group(function() {
    Route::get('/', [AdminController::class, "index"]);
    Route::post('/', [AdminController::class, "loginProcess"]);
    Route::get('logout', [AdminController::class, "logout"]);


    Route::prefix('product-categories')->group(function() {
        Route::get("/", [ProductCategoryController::class, "index"]);
        Route::get("/create", [ProductCategoryController::class, "create"]);
        Route::post("/save", [ProductCategoryController::class, "store"]);
        Route::get("/edit/{id}", [ProductCategoryController::class, "edit"]);
        Route::put("/update/{id}", [ProductCategoryController::class, "update"]);
        Route::delete("/delete/{id}", [ProductCategoryController::class, "destroy"]);
    });
    
});

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
