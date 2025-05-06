<?php

namespace App\Providers;

use App\Models\Service;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Share 'navServices' data with all views using View Composer
        View::composer('*', function ($view) {
            // Retrieve 'services_menu' from cache or query and cache it for 24 hours
            $navServices = Cache::remember('services_menu', 60 * 24, function () {
                return Service::select('title', 'slug')->get();
            });

            // Bind the cached data to the 'navServices' variable in all views
            $view->with('navServices', $navServices);
        });
    }
}
