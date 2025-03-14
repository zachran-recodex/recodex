<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Member;
use App\Models\Counter;
use App\Models\Project;
use App\Models\Service;
use App\Models\HeroSection;
use App\Models\WorkProcess;

class MainController extends Controller
{
    public function index()
    {
        $hero = HeroSection::first();
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

}
