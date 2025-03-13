<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::controller(MainController::class)->group(function () {

    Route::get('/', 'index')->name('home');
    Route::get('about', 'about')->name('about');
    Route::get('blog', 'blog')->name('blog');
    Route::get('service', 'service')->name('service');
    Route::get('contact', 'contact')->name('contact');
    Route::get('faq', 'faq')->name('faq');
    Route::get('portfolio', 'portfolio')->name('portfolio');
    Route::get('pricing', 'pricing')->name('pricing');
    Route::get('team', 'team')->name('team');
    Route::get('testimonial', 'testimonial')->name('testimonial');

});

Route::middleware(['auth', 'can:access dashboard'])->group(function () {

    Route::view('/dashboard', 'dashboard.index')->name('dashboard');

    Route::prefix('dashboard')->name('dashboard.')->group(function (){

        Route::view('/about', 'dashboard.about')->name('about');

        Route::view('/blog', 'dashboard.blog')->name('blog');

        Route::view('/client', 'dashboard.client')->name('client');

        Route::view('/counter', 'dashboard.counter')->name('counter');

        Route::view('/faq', 'dashboard.faq')->name('faq');

        Route::view('/hero-section', 'dashboard.hero-section')->name('hero-section');

        Route::view('/member', 'dashboard.member')->name('member');

        Route::view('/portfolio', 'dashboard.portfolio')->name('portfolio');

        Route::view('/pricing', 'dashboard.pricing')->name('pricing');

        Route::view('/service', 'dashboard.service')->name('service');

        Route::view('/testimonial', 'dashboard.testimonial')->name('testimonial');

        Route::view('/video', 'dashboard.video')->name('video');

        Route::view('/work-process', 'dashboard.work-process')->name('work-process');

        Route::view('/entity-relationship-diagram', 'dashboard.erd')->name('erd');

    });

    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';
