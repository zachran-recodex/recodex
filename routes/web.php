<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProfileController;

Route::get('/', [MainController::class, 'index'])->name('home');

Route::get('/menu', [MainController::class, 'menu'])->name('menu');

Route::get('/tentang-kami', [MainController::class, 'about'])->name('about');

Route::get('/layanan', [MainController::class, 'service'])->name('service');

Route::get('/portofolio', [MainController::class, 'portfolio'])->name('portfolio');

Route::get('/kontak', [MainController::class, 'contact'])->name('contact');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
