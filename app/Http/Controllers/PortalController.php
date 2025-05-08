<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class PortalController extends Controller
{
    /**
     * Menampilkan landing page portal
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        return view('portal.index');
    }

    /**
     * Menampilkan halaman login portal
     *
     * @return \Illuminate\View\View
     */
    public function login(): View
    {
        return view('portal.login');
    }

    /**
     * Menampilkan halaman register portal
     *
     * @return \Illuminate\View\View
     */
    public function register(): View
    {
        return view('portal.register');
    }
}
