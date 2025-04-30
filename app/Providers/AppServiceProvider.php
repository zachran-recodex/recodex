<?php

namespace App\Providers;

use App\Models\Service;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            $navServices = Cache::remember('services_menu', 60*24, function () {
                return Service::select('title', 'slug')->get();
            });
            $view->with('navServices', $navServices);
        });
    }
}
