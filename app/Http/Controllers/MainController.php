<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Hero;
use App\Models\About;
use App\Models\Member;
use App\Models\Counter;
use App\Models\Project;
use App\Models\Service;
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

        return view('main.index', compact('hero', 'services', 'counters', 'projects', 'workProcesses', 'members'));
    }

    public function about()
    {
        $about = About::first();
        $counters = Counter::all();

        return view('main.about', compact('about', 'counters'));
    }
    public function service()
    {
        $services = Service::all();
        $workProcesses = WorkProcess::all();
        $faqs = Faq::all();

        return view('main.service', compact('services', 'workProcesses', 'faqs'));
    }

    public function faq()
    {
        $faqs = Faq::all();

        return view('main.faq', compact('faqs'));
    }

    public function project()
    {
        $projects = Project::all();

        return view('main.project', compact('projects'));
    }

    public function contact()
    {
        $faqs = Faq::all();

        return view('main.contact', compact('faqs'));
    }
}
