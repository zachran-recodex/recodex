<?php

namespace App\Livewire;

use Livewire\Component;
use Spatie\Analytics\Facades\Analytics;
use Spatie\Analytics\Period;

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

    public function mount()
    {
        $this->loadAnalyticsData();
    }

    public function loadAnalyticsData()
    {
        try {
            $period = Period::days($this->period);

            // Fetch visitors and page views
            $this->visitorsAndPageViews = Analytics::fetchVisitorsAndPageViews($period);

            // Fetch top countries
            $this->topCountries = Analytics::fetchTopCountries($period);

            // Fetch top operating systems
            $this->topOperatingSystems = Analytics::fetchTopOperatingSystems($period);

        } catch (\Exception $e) {
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
