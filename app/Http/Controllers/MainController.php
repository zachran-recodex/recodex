<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        return view('main.coming-soon');
    }

    public function about()
    {
        $about = About::first();

        return view('main.about', compact('about'));
    }

}
