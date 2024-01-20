<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

// Fixing Bootstrap Pagination Style
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //generates actual images
        if (!$this->app->environment('production')) {
            $this->app->register('App\Providers\FakerServiceProvider');
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Fixing Bootstrap Pagination Style
        Paginator::useBootstrap();
    }
}
