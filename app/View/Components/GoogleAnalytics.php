<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class GoogleAnalytics extends Component
{
    public $trackingId;

    /**
     * Create a new component instance.
     */
    public function __construct($trackingId = null)
    {
        $this->trackingId = $trackingId ?? config('services.google.analytics_id', 'G-4D32DGGKGQ');
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.google-analytics');
    }
}
