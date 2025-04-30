<?php

namespace App\Livewire\CMS;

use App\Models\Faq;
use App\Models\Pricing;
use App\Models\Service;
use App\Models\Member;
use App\Models\Project;
use App\Models\WorkProcess;
use Livewire\Component;

class Overview extends Component
{
    public function render()
    {
        $stats = [
            'faqs' => [
                'total' => Faq::count(),
                'active' => Faq::where('is_active', true)->count(),
                'inactive' => Faq::where('is_active', false)->count(),
            ],
            'services' => [
                'total' => Service::count(),
                'active' => Service::where('is_active', true)->count(),
                'inactive' => Service::where('is_active', false)->count(),
            ],
            'members' => [
                'total' => Member::count(),
                'active' => Member::where('is_active', true)->count(),
                'inactive' => Member::where('is_active', false)->count(),
            ],
            'pricings' => [
                'total' => Pricing::count(),
                'active' => Pricing::where('is_active', true)->count(),
                'inactive' => Pricing::where('is_active', false)->count(),
            ],
            'projects' => [
                'total' => Project::count(),
                'active' => Project::where('is_active', true)->count(),
                'inactive' => Project::where('is_active', false)->count(),
            ],
            'work_processes' => [
                'total' => WorkProcess::count(),
                'active' => WorkProcess::where('is_active', true)->count(),
                'inactive' => WorkProcess::where('is_active', false)->count(),
            ],
        ];

        return view('livewire.cms.overview', [
            'stats' => $stats
        ]);
    }
}
