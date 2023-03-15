<?php

use App\Http\Controllers\Admin\AdminController as AdminAdminController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\ProductCategoryController as AdminProductCategoryController;
use App\Http\Controllers\Admin\ProductGroupController as AdminProductGroupController;
use App\Http\Controllers\Admin\ProductGoodController as AdminProductGoodController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\PageController;
use App\Http\Controllers\Manager\ManagerController;
use App\Http\Controllers\Manager\OrderController as ManagerOrderController;
use App\Http\Controllers\Manager\ProductGoodController as ManagerProductGoodController;
use App\Http\Controllers\Manager\ProductGroupController as ManagerProductGroupController;
use App\Http\Controllers\ProductGoodController;
use App\Http\Controllers\SuperAdmin\AdminController;
use App\Http\Controllers\SuperAdmin\BannerController;
use App\Http\Controllers\SuperAdmin\ChatGroupController;
use App\Http\Controllers\SuperAdmin\CryptoWalletSettings;
use App\Http\Controllers\SuperAdmin\MediaGalleryController;
use App\Http\Controllers\SuperAdmin\NewsController;
use App\Http\Controllers\SuperAdmin\OrderController;
use App\Http\Controllers\SuperAdmin\ProductCategoryController;
use App\Http\Controllers\SuperAdmin\ProductGroupController;
use App\Http\Controllers\SuperAdmin\UserController;
use App\Http\Controllers\SuperAdmin\SettingController;
use App\Http\Controllers\SuperAdmin\TestimonialController;
use App\Http\Controllers\SuperAdmin\GeneralWalletSettings;
use App\Http\Controllers\SuperAdmin\ProductGoodController as SuperAdminProductGoodController;

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
    });

    Route::prefix('/sa1991as')->middleware('IsSuperAdminLogin')->group(function() {

        Route::get('logout', [AdminController::class, "logout"]);

        // Profile
        Route::get('profile', [AdminController::class, "profile"]);
        Route::put('profile', [AdminController::class, "updateProfile"]);

        Route::post('admin-managers', [AdminController::class, "adminManagers"]);

        // Product Categories
        Route::resource('product-categories', ProductCategoryController::class);

        // Product Groups
        Route::resource('product-groups', ProductGroupController::class);
        Route::get('product-groups/permissions/{manager}/{product}', [ProductGroupController::class, "addPermission"]);
        Route::post('product-groups/permissions/{manager}/{product}', [ProductGroupController::class, "savePermission"]);

        // media gallery
        Route::resource('gallery', MediaGalleryController::class);
        // Product Goods
        Route::resource('product-goods', SuperAdminProductGoodController::class);

        Route::prefix('orders')->group(function() {
            Route::get('/', [OrderController::class, 'index']);
        });

        // User Management
        Route::resource('user-management', UserController::class);

        // News
        Route::resource('news', NewsController::class);

        // Banners
        Route::resource('banners', BannerController::class);

        // Testimonials
        Route::resource('testimonials', TestimonialController::class);

        // Chat Groups
        Route::resource('chat-groups', ChatGroupController::class);

        // Settings
        Route::prefix('settings')->group(function() {
            Route::get("general", [SettingController::class, "generalSettings"]);
            Route::put("general", [SettingController::class, "updateGeneralSettings"]);
            Route::get("/smtp", [SettingController::class, "smtp"]);
            Route::put("/smtp", [SettingController::class, "updateSMTP"]);
        });

        // Wallet Settings
        Route::prefix('wallet-settings')->group(function() {
        // General Wallet
            Route::resource("general-wallet", GeneralWalletSettings::class);
            Route::get("general-wallet/{id}/change-status", [GeneralWalletSettings::class, "changeStatus"]);
            // Crypto Wallet
            Route::resource("crypto-wallet", CryptoWalletSettings::class);
            Route::get("crypto-wallet/{id}/change-status", [CryptoWalletSettings::class, "changeStatus"]);
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
    });

    Route::prefix('/a1aa')->middleware('IsAdminLogin')->group(function() {

        Route::get('logout', [AdminAdminController::class, "logout"]);
        Route::get('profile', [AdminAdminController::class, "profile"]);
        Route::put('profile', [AdminAdminController::class, "updateProfile"]);
        // Product Groups
        Route::resource('product-groups', AdminProductGroupController::class);
        Route::resource('product-goods', AdminProductGoodController::class);
        Route::resource('product-categories', AdminProductCategoryController::class);
        Route::prefix('orders')->group(function() {
        Route::get('/', [AdminOrderController::class, 'index']);
        });
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
    });

    Route::prefix('/m1001m')->middleware('IsAdminLogin')->group(function() {

        Route::get('logout', [ManagerController::class, "logout"]);
        Route::get('profile', [ManagerController::class, "profile"]);
        Route::put('profile', [ManagerController::class, "updateProfile"]);
        // Product Groups
        Route::resource('product-groups', ManagerProductGroupController::class);
        Route::resource('product-goods', ManagerProductGoodController::class);
        Route::prefix('orders')->group(function() {
        Route::get('/', [ManagerOrderController::class, 'index']);
        });
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

    Route::prefix('/')->middleware('IsCustomerLogin')->group(function() {

        Route::get('logout', [HomeController::class, "logout"]);
        Route::get('account', [HomeController::class, "myAccount"]);
        Route::get('orders', [HomeController::class, "OrderHistory"]);
        Route::get('orders/view/id', [HomeController::class, "viewOrder"]);
        Route::get('order-verifications', [HomeController::class, "orderVerification"]);
        Route::get('profile', [HomeController::class, "profile"]);
        Route::put('profile', [HomeController::class, "profileUpdate"]);
    });

    Route::get('products/quick-view/{id}', [PageController::class, "quickViewProduct"]);
    Route::get('products/view/{id}', [PageController::class, "viewProduct"]);
    Route::post('add-to-cart/{id}', [PageController::class, "addToCart"]);
    Route::get('cart', [PageController::class, "viewCart"]);

    // cart login page token
    Route::get('cart/{id}', [PageController::class, "viewCart"]);
    Route::post('cart-buy-without-registration', [PageController::class, "buyWithoutRegistration"]);

    Route::post('cart', [PageController::class, "viewCart"]);
    Route::post('update-cart', [PageController::class, "UpdateCartQuantity"]);
    Route::get('remove-from-cart/{id}', [PageController::class, "RemoveFromCart"]);

    Route::post('payment-mthod-response', [PageController::class, "paymentMethodResponse"]);
    Route::get('payment-modal', [PageController::class, "paymentMethod"]);

    Route::post('checkout/{id}', [PageController::class, "checkoutProcess"]);
    Route::get('checkout', [PageController::class, "checkoutSuccess"]);


    Route::get('order-verification', [PageController::class, "orderVerification"]);
    Route::get('news', [PageController::class, "news"]);
    Route::get('news/{id}', [PageController::class, "newsDetails"]);
    Route::get('how-to-buy', [PageController::class, "howToBuy"]);
});
