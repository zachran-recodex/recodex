<?php

use App\Http\Controllers\Portal\MainController;
use Illuminate\Support\Facades\Route;

Route::domain('portal.' . env('APP_URL'))->group(function () {

    Route::controller(MainController::class)->name('portal.')->group(function () {

        Route::get('/', 'index')->name('home');

    });

});
