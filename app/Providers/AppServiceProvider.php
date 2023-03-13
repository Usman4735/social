<?php

namespace App\Providers;

use App\Models\Admin;
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
        view()->share('admins', Admin::where('role', 'admin')->where('status', 1)->get());
    }
}
