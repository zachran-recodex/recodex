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
    Route::get('project', 'project')->name('project');
    Route::get('pricing', 'pricing')->name('pricing');
    Route::get('team', 'team')->name('team');
    Route::get('testimonial', 'testimonial')->name('testimonial');

});

Route::middleware(['auth', 'can:access dashboard'])->group(function () {

    Route::view('/dashboard', 'dashboard.index')->name('dashboard');

    Route::prefix('dashboard')->name('dashboard.')->group(function (){

        Route::view('/about', 'dashboard.cms.about')->name('about');

        Route::view('/blog', 'dashboard.cms.blog')->name('blog');

        Route::view('/client', 'dashboard.cms.client')->name('client');

        Route::view('/counter', 'dashboard.cms.counter')->name('counter');

        Route::view('/faq', 'dashboard.cms.faq')->name('faq');

        Route::view('/hero', 'dashboard.cms.hero')->name('hero');

        Route::view('/member', 'dashboard.cms.member')->name('member');

        Route::view('/project', 'dashboard.cms.project')->name('project');

        Route::view('/service', 'dashboard.cms.service')->name('service');

        Route::view('/testimonial', 'dashboard.cms.testimonial')->name('testimonial');

        Route::view('/video', 'dashboard.cms.video')->name('video');

        Route::view('/work-process', 'dashboard.cms.work-process')->name('work-process');

        Route::view('/entity-relationship-diagram', 'dashboard.cms.erd')->name('erd');

    });

    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';
