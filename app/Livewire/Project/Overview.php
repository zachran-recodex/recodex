<?php

namespace App\Livewire\Project;

use Livewire\Component;
use App\Models\Client;
use App\Models\Project;
use Livewire\WithPagination;

class Overview extends Component
{
    use WithPagination;

    public $sortBy = 'latest_activity';

    public function render()
    {
        $projects = Project::with('client')->paginate(10);

        // Get statistics
        $totalRevenue = Project::sum('cost');
        $totalProjects = Project::count();
        $ongoingProjects = Project::where('status', 'in_progress')->count();
        $totalClients = Client::count();

        return view('livewire.project.overview', compact(
            'projects',
            'totalRevenue',
            'totalProjects',
            'ongoingProjects',
            'totalClients'
        ));
    }
}
