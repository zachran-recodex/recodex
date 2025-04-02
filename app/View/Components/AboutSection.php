<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AboutSection extends Component
{
    public $counters;
    /**
     * Create a new component instance.
     */
    public function __construct($counters)
    {
        $this->counters = $counters;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.about-section');
    }
}
