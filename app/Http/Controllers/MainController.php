<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Hero;
use App\Models\About;
use App\Models\Client;
use App\Models\User;
use App\Models\Project;
use App\Models\Service;
use App\Models\WorkProcess;

class MainController extends Controller
{
    public function index()
    {
        $hero = Hero::first();

        $services = Service::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        $projects = Project::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        $works = WorkProcess::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        $users = User::where('is_team', true)
            ->orderBy('sort_order')
            ->limit(4)
            ->get();

        return view('main.index', compact('hero', 'services', 'projects', 'works', 'users'));
    }

    public function about()
    {
        $about = About::first();

        $users = User::where('is_team', true)
            ->orderBy('sort_order')
            ->get();

        return view('main.about', compact('about', 'users'));
    }

    public function service()
    {
        $services = Service::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        $works = WorkProcess::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        $faqs = Faq::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        return view('main.service', compact('services', 'works', 'faqs'));
    }

    public function showService(Service $service)
    {
        if (!$service->is_active) {
            abort(404);
        }

        $relatedServices = Service::where('id', '!=', $service->id)
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->limit(3)
            ->get();

        return view('main.service-details', compact('service', 'relatedServices'));
    }

    public function project()
    {
        $projects = Project::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        return view('main.project', compact('projects'));
    }

    public function showProject($service_slug, $slug, $client_slug)
    {
        // Find service with necessary relationships
        $service = Service::where('slug', $service_slug)->firstOrFail();

        // Find project with all needed relationships
        $project = Project::where('slug', $slug)
                    ->where('service_id', $service->id)
                    ->whereHas('client', function($query) use ($client_slug) {
                        $query->where('slug', $client_slug);
                    })
                    ->firstOrFail();

        // Verify client relationship
        $client = Client::where('slug', $client_slug)
                    ->whereHas('projects', function($query) use ($project) {
                        $query->where('id', $project->id);
                    })
                    ->firstOrFail();

        // Load related projects with their relationships
        $relatedProjects = Project::with(['client'])
                                ->where('id', '!=', $project->id)
                                ->take(6)
                                ->get();

        return view('main.project-details', compact(
            'project',
            'service',
            'client',
            'relatedProjects'
        ));
    }

    public function contact()
    {
        return view('main.contact');
    }
}
