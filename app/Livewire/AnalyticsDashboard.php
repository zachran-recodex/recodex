<?php

namespace App\Livewire;

use App\Services\AnalyticsService;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class AnalyticsDashboard extends Component
{
    public $period = 7; // Default period 7 days
    public $periodOptions = [
        1 => '1 day',
        2 => '2 days',
        4 => '4 days',
        7 => '7 days',
        30 => '30 days',
    ];

    public $visitorsAndPageViews = [];
    public $topCountries = [];
    public $topOperatingSystems = [];
    public $topBrowsers = [];
    public $mostVisitedPages = [];

    protected $analyticsService;

    public function boot(AnalyticsService $analyticsService)
    {
        $this->analyticsService = $analyticsService;
    }

    public function mount()
    {
        $this->loadAnalyticsData();
    }

    public function loadAnalyticsData()
    {
        try {
            // Fetch visitors and page views
            $this->visitorsAndPageViews = $this->analyticsService->getVisitorsAndPageViews(intval($this->period));

            // Fetch top countries
            $this->topCountries = $this->analyticsService->getTopCountries(intval($this->period));

            // Fetch top operating systems
            $this->topOperatingSystems = $this->analyticsService->getTopOperatingSystems(intval($this->period));

            // Fetch top browsers
            $this->topBrowsers = $this->analyticsService->getTopBrowsers(intval($this->period));

            // Fetch most visited pages
            $this->mostVisitedPages = $this->analyticsService->getMostVisitedPages(intval($this->period));

        } catch (\Exception $e) {
            Log::error('Analytics error: ' . $e->getMessage());
            session()->flash('error', 'Failed to load Analytics data: ' . $e->getMessage());
        }
    }

    public function updatedPeriod()
    {
        $this->loadAnalyticsData();
    }

    public function render()
    {
        return view('livewire.analytics-dashboard');
    }
}
