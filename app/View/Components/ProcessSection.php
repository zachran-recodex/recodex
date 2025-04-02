<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProcessSection extends Component
{
    public $workProcesses;
    /**
     * Create a new component instance.
     */
    public function __construct($workProcesses)
    {
        $this->workProcesses = $workProcesses;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.process-section');
    }
}
