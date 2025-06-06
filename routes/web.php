<?php

use Livewire\Volt\Volt;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

Route::controller(MainController::class)->group(function () {

    Route::get('/', 'index')->name('home');

    Route::get('/tentang-kami', 'about')->name('about');

    Route::get('/layanan', 'service')->name('services');

    Route::get('/layanan/{service}', 'showService')->name('services.show');

    Route::get('/portfolio', 'project')->name('projects');

    Route::get('/portfolio/{service_slug}/{slug}/{client_slug}', 'showProject')->name('projects.show');

    Route::get('/konsultasi', 'contact')->name('contact');

});

Route::view('dashboard', 'dashboard.index')
    ->middleware(['auth', 'verified', 'active.user'])
    ->name('dashboard');

Route::middleware(['auth', 'active.user'])->group(function () {

    Route::prefix('dashboard')->group(function () {

        // Administrator Routes
        Route::middleware(['can:manage admin'])->prefix('administrator')->name('admin.')->group(function () {
            Route::get('/users', App\Livewire\Administrator\ManageUsers::class)->name('users');
            Route::get('/roles', App\Livewire\Administrator\ManageRoles::class)->name('roles');
        });

        // CMS Routes
        Route::middleware(['can:manage cms'])->prefix('content-management-system')->name('cms.')->group(function () {
            Route::get('/faqs', App\Livewire\CMS\ManageFaqs::class)->name('faqs');
            Route::get('/services', App\Livewire\CMS\ManageServices::class)->name('services');
            Route::get('/pricings', App\Livewire\CMS\ManagePricings::class)->name('pricings');
            Route::get('/work-processes', App\Livewire\CMS\ManageWorkProcesses::class)->name('work-processes');
            Route::get('/about', App\Livewire\CMS\ManageAbout::class)->name('about');
            Route::get('/hero', App\Livewire\CMS\ManageHero::class)->name('hero');
        });

        // Project Management Routes
        Route::middleware(['can:manage pm'])->prefix('project-management')->name('pm.')->group(function () {
            Route::get('/projects', App\Livewire\ProjectManagement\ManageProjects::class)->name('projects');
            Route::get('/clients', App\Livewire\ProjectManagement\ManageClients::class)->name('clients');
            Route::get('/invoices', App\Livewire\ProjectManagement\ManageInvoices::class)->name('invoices');
        });

        // Settings Route
        Route::redirect('settings', 'settings/profile');
        Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
        Volt::route('settings/password', 'settings.password')->name('settings.password');
        Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
    });
});

require __DIR__.'/auth.php';
