<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Faq;
use App\Models\Hero;
use App\Models\Member;
use App\Models\Project;
use App\Models\Service;
use App\Models\WorkProcess;

/**
 * MainController handles the primary pages of the application.
 *
 * This controller is responsible for rendering the main pages of the website,
 * including the homepage, about page, services pages, project pages, and contact page.
 * It fetches the necessary data from the database and passes it to the views.
 *
 * @package App\Http\Controllers
 */
class MainController extends Controller
{
    /**
     * Display the homepage.
     *
     * Retrieves the hero section, active services, projects, work processes, and team members
     * to be displayed on the homepage.
     *
     * @return \Illuminate\View\View
     */
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

        $members = Member::where('is_active', true)
            ->orderBy('sort_order')
            ->limit(4)
            ->get();

        return view('main.index', compact('hero', 'services', 'projects', 'works', 'members'));
    }

    /**
     * Display the about page.
     *
     * Retrieves the about section data and all active team members to display on the about page.
     *
     * @return \Illuminate\View\View
     */
    public function about()
    {
        $about = About::first();

        $members = Member::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        return view('main.about', compact('about', 'members'));
    }

    /**
     * Display the services page.
     *
     * Retrieves all active services, work processes, and FAQs to display on the services page.
     *
     * @return \Illuminate\View\View
     */
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

    /**
     * Display a specific service details page.
     *
     * Shows details for a specific service and includes related services for cross-navigation.
     * Returns 404 if the service is not active.
     *
     * @param \App\Models\Service $service The service model instance via route model binding
     * @return \Illuminate\View\View
     */
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

    /**
     * Display the projects page.
     *
     * Retrieves all active projects to display on the projects page.
     *
     * @return \Illuminate\View\View
     */
    public function project()
    {
        $projects = Project::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        return view('main.project', compact('projects'));
    }

    /**
     * Display a specific project details page.
     *
     * Shows details for a specific project identified by slug and client_slug,
     * and includes related projects for cross-navigation.
     *
     * @param string $slug The project's slug
     * @param string $client_slug The client's slug
     * @return \Illuminate\View\View
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException If no active project is found with the given slugs
     */
    public function showProject($slug, $client_slug)
    {
        $project = Project::where('slug', $slug)
            ->where('client_slug', $client_slug)
            ->where('is_active', true)
            ->firstOrFail();

        $relatedProjects = Project::where('id', '!=', $project->id)
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->limit(6)
            ->get();

        return view('main.project-details', compact('project', 'relatedProjects'));
    }

    /**
     * Display the contact page.
     *
     * @return \Illuminate\View\View
     */
    public function contact()
    {
        return view('main.contact');
    }
}
