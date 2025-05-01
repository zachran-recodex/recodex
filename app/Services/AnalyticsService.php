<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Spatie\Analytics\Facades\Analytics;
use Spatie\Analytics\Period;

class AnalyticsService
{
    /**
     * Get visitors and page views for a given period
     *
     * @param int $days
     * @return array
     */
    public function getVisitorsAndPageViews(int $days = 7): array
    {
        try {
            $cacheKey = "analytics_visitors_pageviews_{$days}";

            return Cache::remember($cacheKey, now()->addHours(1), function () use ($days) {
                return Analytics::fetchVisitorsAndPageViews(Period::days($days));
            });
        } catch (\Exception $e) {
            Log::error('Failed to fetch visitors and page views: ' . $e->getMessage());
            return [];
        }
    }

    /**
     * Get top countries for a given period
     *
     * @param int $days
     * @param int $limit
     * @return array
     */
    public function getTopCountries(int $days = 7, int $limit = 10): array
    {
        try {
            $cacheKey = "analytics_top_countries_{$days}_{$limit}";

            return Cache::remember($cacheKey, now()->addHours(1), function () use ($days, $limit) {
                return Analytics::fetchTopCountries(Period::days($days), $limit);
            });
        } catch (\Exception $e) {
            Log::error('Failed to fetch top countries: ' . $e->getMessage());
            return [];
        }
    }

    /**
     * Get top operating systems for a given period
     *
     * @param int $days
     * @param int $limit
     * @return array
     */
    public function getTopOperatingSystems(int $days = 7, int $limit = 10): array
    {
        try {
            $cacheKey = "analytics_top_os_{$days}_{$limit}";

            return Cache::remember($cacheKey, now()->addHours(1), function () use ($days, $limit) {
                return Analytics::fetchTopOperatingSystems(Period::days($days), $limit);
            });
        } catch (\Exception $e) {
            Log::error('Failed to fetch top operating systems: ' . $e->getMessage());
            return [];
        }
    }

    /**
     * Get top browsers for a given period
     *
     * @param int $days
     * @param int $limit
     * @return array
     */
    public function getTopBrowsers(int $days = 7, int $limit = 10): array
    {
        try {
            $cacheKey = "analytics_top_browsers_{$days}_{$limit}";

            return Cache::remember($cacheKey, now()->addHours(1), function () use ($days, $limit) {
                return Analytics::fetchTopBrowsers(Period::days($days), $limit);
            });
        } catch (\Exception $e) {
            Log::error('Failed to fetch top browsers: ' . $e->getMessage());
            return [];
        }
    }

    /**
     * Get most visited pages for a given period
     *
     * @param int $days
     * @param int $limit
     * @return array
     */
    public function getMostVisitedPages(int $days = 7, int $limit = 10): array
    {
        try {
            $cacheKey = "analytics_most_visited_pages_{$days}_{$limit}";

            return Cache::remember($cacheKey, now()->addHours(1), function () use ($days, $limit) {
                return Analytics::fetchMostVisitedPages(Period::days($days), $limit);
            });
        } catch (\Exception $e) {
            Log::error('Failed to fetch most visited pages: ' . $e->getMessage());
            return [];
        }
    }
}
