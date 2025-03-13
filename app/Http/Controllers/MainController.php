<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Service;
use App\Models\HeroSection;

class MainController extends Controller
{
    public function index()
    {
        $hero = HeroSection::first();
        $services = Service::all();

        return view('main.index', compact('hero', 'services'));
    }

    public function about()
    {
        $about = About::first();

        return view('main.about', compact('about'));
    }

}
