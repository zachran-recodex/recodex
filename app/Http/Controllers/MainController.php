<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Member;
use App\Models\Counter;
use App\Models\Project;
use App\Models\Service;
use App\Models\Hero;
use App\Models\WorkProcess;

class MainController extends Controller
{
    public function index()
    {
        $hero = Hero::first();
        $services = Service::all();
        $counters = Counter::all();
        $projects = Project::all();
        $workProcesses = WorkProcess::all();
        $members = Member::all();

        return view('main.index', compact('hero', 'services', 'counters', 'projects', 'workProcesses', 'members'));
    }

    public function about()
    {
        $about = About::first();

        return view('main.about', compact('about'));
    }

    public function blog()
    {
        return view('main.blog');
    }

    public function service()
    {
        return view('main.service');
    }

    public function contact()
    {
        return view('main.contact');
    }

    public function faq()
    {
        return view('main.faq');
    }

    public function project()
    {
        return view('main.project');
    }

    public function pricing()
    {
        return view('main.pricing');
    }

    public function team()
    {
        return view('main.team');
    }

    public function testimonial()
    {
        return view('main.testimonial');
    }
}
