<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {

        // This directive will remove it from the component since we want to use it for our own purposes
        Blade::directive('studio', function ($expression) {
            return "";
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //

    }
}

