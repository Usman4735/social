<?php

use App\Http\Controllers\Admin\AdminController as AdminAdminController;
use App\Http\Controllers\Admin\ProductCategoryController as AdminProductCategoryController;
use App\Http\Controllers\Admin\ProductGroupController as AdminProductGroupController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Manager\ManagerController;
use App\Http\Controllers\Manager\ProductCategoryController as ManagerProductCategoryController;
use App\Http\Controllers\Manager\ProductGroupController as ManagerProductGroupController;
use App\Http\Controllers\ProductGoodController;
use App\Http\Controllers\SuperAdmin\AdminController;
use App\Http\Controllers\SuperAdmin\MediaGalleryController;
use App\Http\Controllers\SuperAdmin\NewsController;
use App\Http\Controllers\SuperAdmin\ProductCategoryController;
use App\Http\Controllers\SuperAdmin\ProductGroupController;
use App\Http\Controllers\SuperAdmin\UserController;
use App\Http\Controllers\SuperAdmin\SettingController;
use App\Http\Controllers\SuperAdmin\TestimonialController;


// Super Admin Routes
Route::prefix('sa1991as')->group(function() {
    Route::get('/', [AdminController::class, "index"]);
    Route::post('/', [AdminController::class, "loginProcess"]);
    Route::get('forgot-password', [AdminController::class, "forgotPassword"]);
    Route::post('forgot-password', [AdminController::class, "processForgotPassword"]);

    Route::get('otp/{id}', [AdminController::class, "otp"]);
    Route::post('otp/{id}', [AdminController::class, "otpVerify"]);

    Route::get('reset-password/{id}', [AdminController::class, "resetPassword"]);
    Route::post('reset-password', [AdminController::class, "processResetPassword"]);


    Route::get('logout', [AdminController::class, "logout"]);

    // Profile
    Route::get('profile', [AdminController::class, "profile"]);
    Route::put('profile', [AdminController::class, "updateProfile"]);

    // Product Categories
    Route::resource('product-categories', ProductCategoryController::class);

    // Product Groups
    Route::resource('product-groups', ProductGroupController::class);

    // media gallery
    Route::resource('gallery', MediaGalleryController::class);
    // Product Goods
    Route::resource('product-goods', ProductGoodController::class);

    // User Management
    Route::resource('user-management', UserController::class);

    // News
    Route::resource('news', NewsController::class);

    // Testimonials
    Route::resource('testimonials', TestimonialController::class);

    // Settings
    Route::prefix('settings')->group(function() {
        Route::get("general", [SettingController::class, "generalSettings"]);
        Route::put("general", [SettingController::class, "updateGeneralSettings"]);
        Route::get("/smtp", [SettingController::class, "smtp"]);
        Route::put("/smtp", [SettingController::class, "updateSMTP"]);
    });
});

// ----------------------------------------------------------------------------------------------------

// admin
Route::prefix('a1aa')->group(function() {
    Route::get('/', [AdminAdminController::class, "index"]);
    Route::post('/', [AdminAdminController::class, "loginProcess"]);
    Route::get('forgot-password', [AdminAdminController::class, "forgotPassword"]);
    Route::post('forgot-password', [AdminAdminController::class, "processForgotPassword"]);

    Route::get('otp/{id}', [AdminAdminController::class, "otp"]);
    Route::post('otp/{id}', [AdminAdminController::class, "otpVerify"]);

    Route::get('reset-password/{id}', [AdminAdminController::class, "resetPassword"]);
    Route::post('reset-password', [AdminAdminController::class, "processResetPassword"]);


    Route::get('logout', [AdminAdminController::class, "logout"]);

    Route::get('profile', [AdminAdminController::class, "profile"]);
    Route::put('profile', [AdminAdminController::class, "updateProfile"]);

    Route::resource('product-categories', AdminProductCategoryController::class);

    // Product Groups
    Route::resource('product-groups', AdminProductGroupController::class);

});

// ----------------------------------------------------------------------------------------------------

// manager
Route::prefix('m1001m')->group(function() {

    Route::get('/', [ManagerController::class, "index"]);
    Route::post('/', [ManagerController::class, "loginProcess"]);
    Route::get('forgot-password', [ManagerController::class, "forgotPassword"]);
    Route::post('forgot-password', [ManagerController::class, "processForgotPassword"]);

    Route::get('otp/{id}', [ManagerController::class, "otp"]);
    Route::post('otp/{id}', [ManagerController::class, "otpVerify"]);

    Route::get('reset-password/{id}', [ManagerController::class, "resetPassword"]);
    Route::post('reset-password', [ManagerController::class, "processResetPassword"]);


    Route::get('logout', [ManagerController::class, "logout"]);

    Route::get('profile', [ManagerController::class, "profile"]);
    Route::put('profile', [ManagerController::class, "updateProfile"]);

    Route::resource('product-categories', ManagerProductCategoryController::class);

    // Product Groups
    Route::resource('product-groups', ManagerProductGroupController::class);

});

// ----------------------------------------------------------------------------------------------------

// website
Route::prefix('/')->group(function() {

    Route::get('forgot-password', [HomeController::class, "forgotPassword"]);
    Route::post('forgot-password', [HomeController::class, "processForgotPassword"]);

    Route::get('otp/{id}', [HomeController::class, "otp"]);
    Route::post('otp/{id}', [HomeController::class, "otpVerify"]);

    Route::get('reset-password/{id}', [HomeController::class, "resetPassword"]);
    Route::post('reset-password', [HomeController::class, "processResetPassword"]);


    Route::get('/', [HomeController::class, "index"]);

    // Register
    Route::get('register', [HomeController::class, "register"]);
    Route::post('register', [HomeController::class, "registerProcess"]);
    // Login
    Route::get('login', [HomeController::class, "login"]);
    Route::post('login', [HomeController::class, "loginProcess"]);
    Route::get('logout', [HomeController::class, "logout"]);
});
