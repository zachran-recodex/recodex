<?php

use App\Http\Controllers\VendorUpdateController;
use Illuminate\Support\Facades\Route;

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

    Route::get('/vendor-update', [VendorUpdateController::class, 'index'])
        ->name('vendor.update');

    Route::post('/vendor-update', [VendorUpdateController::class, 'update'])
        ->name('vendor.update.execute');
});
