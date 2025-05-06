<?php

use Illuminate\Support\Facades\Route;

// Include authentication routes
require __DIR__.'/auth.php';

// Guest routes
Route::middleware('guest')->group(function () {
    Route::get('/', function () {
        return redirect()->route('login');
    });
});

// Protected routes
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
