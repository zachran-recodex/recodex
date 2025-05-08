<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;

class MainController extends Controller
{
    public function index()
    {
        return view('portal.index');
    }
}
