<?php

use Illuminate\Support\Facades\Route;
use Symfony\Component\Process\Process;

Route::get('/', function () {
    return view('main.index');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard.index');
    })->name('dashboard');

    Route::get('/vendor-update', function () {
        return view('dashboard.vendor-update');
    })->name('vendor.update');
});
