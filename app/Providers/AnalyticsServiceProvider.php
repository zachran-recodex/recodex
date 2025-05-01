<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Spatie\Analytics\Analytics;
use Spatie\Analytics\AnalyticsClientFactory;

class AnalyticsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(Analytics::class, function () {
            $analyticsConfig = config('analytics');

            return new Analytics(
                AnalyticsClientFactory::createForConfig($analyticsConfig),
                $analyticsConfig['property_id']
            );
        });

        $this->app->alias(Analytics::class, 'analytics');
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
