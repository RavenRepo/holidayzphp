<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DestinationsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\ManagerDashboardController;
use App\Http\Controllers\PackageController;
use Illuminate\Support\Facades\Route;

// Main Routes
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/destinations', [DestinationsController::class, 'index'])->name('destinations');

Route::get('/package/{slug}', [PackageController::class, 'show'])->name('package.details');

Route::post('/package/enquiry', [PackageController::class, 'submitEnquiry'])->name('package.enquiry');

Route::view('/about', 'about')->name('about');
Route::get('/blog', [BlogController::class, 'index'])->name('blog');
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

// Dashboard Routes (Authenticated)
Route::middleware(['auth', 'ensure.frontend.role:user|premium_user|verified_traveler|content_creator'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::middleware(['auth', 'ensure.frontend.role:manager'])->group(function () {
    Route::get('/manager/dashboard', [ManagerDashboardController::class, 'index'])->name('manager.dashboard');
});

// Lead Submission
Route::post('/lead/submit', [LeadController::class, 'submit'])->name('lead.submit');
