<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProjectSection extends Component
{
    public $projects;
    /**
     * Create a new component instance.
     */
    public function __construct($projects)
    {
        $this->projects = $projects;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.project-section');
    }
}
