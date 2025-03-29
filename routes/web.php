<?php

use Livewire\Volt\Volt;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ResetPasswordEmailController;

Route::controller(MainController::class)->group(function () {

    Route::get('/', 'index')->name('home');
    Route::get('about', 'about')->name('about');
    Route::get('service', 'service')->name('service');
    Route::get('faq', 'faq')->name('faq');
    Route::get('project', 'project')->name('project');
    Route::get('testimonial', 'testimonial')->name('testimonial');
    Route::get('contact', 'contact')->name('contact');

});

Route::get('project/reset-password/{token}', [ResetPasswordEmailController::class, 'reset'])
    ->name('project.reset-password');
Route::post('project/reset-password/{token}', [ResetPasswordEmailController::class, 'update'])
    ->name('project.update-password');

Route::middleware(['auth', 'can:access dashboard'])->group(function () {

    Route::view('/dashboard', 'dashboard.index')->name('dashboard');

    Route::prefix('dashboard')->name('dashboard.')->group(function (){

        Route::prefix('admin')->name('admin.')->group(function (){

            Route::get('manage-users', App\Livewire\Admin\ManageUsers::class)
                ->name('user')
                ->middleware('can:manage users');

            Route::get('manage-roles', App\Livewire\Admin\ManageRoles::class)
                ->name('role')
                ->middleware('can:manage roles');
        });

        Route::middleware(['can:manage cms'])->group(function (){

            Route::prefix('cms')->name('cms.')->group(function (){

                Route::get('manage-services', App\Livewire\CMS\ManageServices::class)
                    ->name('services');

                Route::get('manage-blogs', App\Livewire\CMS\ManageBlogs::class)
                    ->name('blogs');

                Route::get('manage-counters', App\Livewire\CMS\ManageCounters::class)
                    ->name('counters');

                Route::get('manage-faqs', App\Livewire\CMS\ManageFaqs::class)
                    ->name('faqs');

                Route::get('manage-work-processes', App\Livewire\CMS\ManageWorkProcesses::class)
                    ->name('work-processes');

                Route::get('manage-about', App\Livewire\CMS\ManageAbout::class)
                    ->name('about');

                Route::get('manage-hero', App\Livewire\CMS\ManageHero::class)
                    ->name('hero');

            });
        });
        
        Route::prefix('project')->name('project.')->group(function (){

            Route::get('/', App\Livewire\Project\Overview::class)
                ->name('overview');

            Route::get('manage-projects', App\Livewire\Project\ManageProjects::class)
                ->name('projects');

            Route::get('manage-clients', App\Livewire\Project\ManageClients::class)
                ->name('clients');

            Route::get('manage-domains', App\Livewire\Project\ManageDomains::class)
                ->name('domains');

            Route::get('manage-emails', App\Livewire\Project\ManageEmails::class)
                ->name('emails');
        });

    });

    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';
