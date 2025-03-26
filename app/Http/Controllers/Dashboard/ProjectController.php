<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Client;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::with('client')->paginate(10);

        // Get statistics
        $totalRevenue = Project::sum('cost');
        $totalProjects = Project::count();
        $ongoingProjects = Project::where('status', 'in_progress')->count();
        $totalClients = Client::count();

        return view('dashboard.project.index', compact(
            'projects',
            'totalRevenue',
            'totalProjects',
            'ongoingProjects',
            'totalClients'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        //
    }
}
