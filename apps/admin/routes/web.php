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
Route::middleware(['auth', 'role:admin|manager'])->group(function () {
    // Redirect to Filament admin panel
    Route::get('/dashboard', function () {
        return redirect('/admin');
    })->name('dashboard');
});
