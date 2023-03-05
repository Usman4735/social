<?php

namespace App\Providers;
use App\Models\Banner;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use App\View\Components\CheckoutResponse;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->share('banners', Banner::all());
        // Blade::component('checkout-response', CheckoutResponse::class);

    }
}
