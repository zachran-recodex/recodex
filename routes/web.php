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

        Route::prefix('admin')->name('admin.')->group(function (){

            Route::view('manage-user', 'dashboard.admin.user')
                ->name('user')
                ->middleware('can:manage users');

            Route::view('manage-role', 'dashboard.admin.role')
                ->name('role')
                ->middleware('can:manage roles');
        });

        Route::middleware(['can:manage cms'])->group(function (){

            Route::prefix('cms')->name('cms.')->group(function (){

                Route::get('manage-services', App\Livewire\CMS\ManageServices::class)
                    ->name('services');

                Route::get('manage-projects', App\Livewire\CMS\ManageProjects::class)
                    ->name('projects');

                Route::get('manage-blogs', App\Livewire\CMS\ManageBlogs::class)
                    ->name('blogs');

                Route::get('manage-clients', App\Livewire\CMS\ManageClients::class)
                    ->name('clients');

                Route::get('manage-counters', App\Livewire\CMS\ManageCounters::class)
                    ->name('counters');

            });
        });

    });

    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';
