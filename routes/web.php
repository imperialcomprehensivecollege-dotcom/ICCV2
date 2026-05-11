<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\PageController;
use App\Http\Controllers\Web\BlogController;
use App\Http\Controllers\Web\GalleryController;
use App\Http\Controllers\Web\AdmissionController;
use App\Http\Controllers\Web\ContactController;

Route::get('/', [HomeController::class, 'index'])->name('home');

// Pages
Route::get('/page/{slug}', [PageController::class, 'show'])->name('page.show');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/academics', [PageController::class, 'academics'])->name('academics');

// Blog
Route::prefix('blog')->name('blog.')->group(function () {
    Route::get('/', [BlogController::class, 'index'])->name('index');
    Route::get('/{slug}', [BlogController::class, 'show'])->name('show');
    Route::get('/category/{slug}', [BlogController::class, 'category'])->name('category');
});

// Gallery
Route::prefix('gallery')->name('gallery.')->group(function () {
    Route::get('/', [GalleryController::class, 'index'])->name('index');
    Route::get('/{slug}', [GalleryController::class, 'show'])->name('show');
});

// Admissions
Route::prefix('admissions')->name('admissions.')->group(function () {
    Route::get('/', [AdmissionController::class, 'index'])->name('index');
    Route::post('/', [AdmissionController::class, 'store'])->name('store');
});

// Contact
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
