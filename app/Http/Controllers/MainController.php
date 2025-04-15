<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Hero;
use App\Models\About;
use App\Models\Contact;
use App\Models\Counter;
use App\Models\Project;
use App\Models\Service;
use App\Models\WorkProcess;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $hero = Hero::first();
        $services = Service::all();
        $counters = Counter::all();
        $projects = Project::all();
        $workProcesses = WorkProcess::all();

        return view('main.index', compact('hero', 'services', 'counters', 'projects', 'workProcesses'));
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

    public function serviceDetail(Service $service)
    {
        $relatedServices = Service::where('id', '!=', $service->id)
                                ->inRandomOrder()
                                ->limit(3)
                                ->get();

        return view('main.service-detail', compact('service', 'relatedServices'));
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

    public function storeContact(Request $request)
    {
        $validated = $request->validate([
            'contact-name' => 'required|string|max:255',
            'contact-email' => 'required|email|max:255',
            'contact-phone' => 'required|string|max:20',
            'contact-massage' => 'required|string'
        ]);

        Contact::create([
            'name' => $validated['contact-name'],
            'email' => $validated['contact-email'],
            'phone' => $validated['contact-phone'],
            'message' => $validated['contact-massage']
        ]);

        return back()->with('success', 'Pesan Anda telah terkirim!');
    }
}
