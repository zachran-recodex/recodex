<?php

use Livewire\Volt\Volt;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ResetPasswordEmailController;

Route::get('sitemap.xml', function() {
    if (file_exists(public_path('sitemap.xml'))) {
        return response()->file(public_path('sitemap.xml'));
    }

    // Generate sitemap if it doesn't exist
    Artisan::call('sitemap:generate');
    return response()->file(public_path('sitemap.xml'));
});

Route::controller(MainController::class)->group(function () {

    Route::get('', 'index')->name('home');
    Route::get('tentang-kami', 'about')->name('about');
    Route::get('layanan', 'service')->name('service');
    Route::get('layanan/{service:slug}', 'serviceDetail')->name('service.detail');
    Route::get('faq', 'faq')->name('faq');
    Route::get('portfolio', 'project')->name('project');
    Route::get('konsultasi', 'contact')->name('contact');
    Route::post('konsultasi', 'storeContact')->name('contact.store');

});

Route::get('project/reset-password/{token}', [ResetPasswordEmailController::class, 'reset'])
    ->name('project.reset-password');
Route::post('project/reset-password/{token}', [ResetPasswordEmailController::class, 'update'])
    ->name('project.update-password');

Route::middleware(['auth', 'can:access dashboard'])->group(function () {

    Route::view('/dashboard', 'dashboard.index')->name('dashboard');

    Route::prefix('dashboard')->name('dashboard.')->group(function (){

        Route::prefix('administrator')->name('administrator.')->group(function (){

            Route::get('manage-users', App\Livewire\Administrator\ManageUsers::class)
                ->name('user')
                ->middleware('can:manage users');

            Route::get('manage-roles', App\Livewire\Administrator\ManageRoles::class)
                ->name('role')
                ->middleware('can:manage roles');

            Route::get('manage-contacts', App\Livewire\Administrator\ManageContacts::class)
                ->name('contact');

            Route::get('manage-sitemap', App\Livewire\Administrator\ManageSitemap::class)
                ->name('sitemap');
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
