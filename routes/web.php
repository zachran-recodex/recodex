<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::view('/', 'main.index')->name('home');
Route::view('about', 'main.about')->name('about');
Route::view('blog', 'main.blog')->name('blog');
Route::view('service', 'main.service')->name('service');
Route::view('contact', 'main.contact')->name('contact');
Route::view('faq', 'main.faq')->name('faq');
Route::view('portfolio', 'main.portfolio')->name('portfolio');
Route::view('pricing', 'main.pricing')->name('pricing');
Route::view('team', 'main.team')->name('team');
Route::view('testimonial', 'main.testimonial')->name('testimonial');

Route::middleware(['auth', 'can:access dashboard'])->group(function () {

    Route::view('/dashboard', 'dashboard.index')->name('dashboard');

    Route::prefix('dashboard')->name('dashboard.')->group(function (){

        Route::view('/entity-relationship-diagram', 'dashboard.erd')->name('erd');

    });

    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';
