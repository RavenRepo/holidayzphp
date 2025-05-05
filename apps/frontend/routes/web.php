<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ContactController;

// Main Routes
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/destinations', function () {
    return view('destinations');
});

Route::get('/package/{slug}', function ($slug) {
    return view('package-details', ['slug' => $slug]);
})->name('package.details');

Route::post('/package/enquiry', [PackageController::class, 'submitEnquiry'])->name('package.enquiry');

Route::view('/about', 'about')->name('about');
Route::view('/blog', 'blog')->name('blog');
Route::view('/contact', 'contact')->name('contact');
Route::view('/privacy', 'privacy')->name('privacy');
Route::view('/terms', 'terms')->name('terms');

// Packages Routes
Route::get('/packages', [PackageController::class, 'index'])->name('packages');

// Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
});

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Contact Form Submission
Route::post('/contact/submit', [ContactController::class, 'submit'])->name('contact.submit');

// UI Component Demo Routes
Route::view('/ui-demo', 'components.demo')->name('ui.demo');
Route::view('/ui-demo/carousel', 'components.ui.carousel.demo')->name('ui.demo.carousel');
