<?php

use Illuminate\Support\Facades\Route;

// TEST ROUTE: Should appear at /test-route
Route::get('/test-route', function () {
    return 'Test route works!';
});

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

Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware('guest:admin')->group(function () {
        Route::get('siteadmin', [App\Http\Controllers\Auth\AdminLoginController::class, 'showLoginForm'])->name('login');
        Route::post('siteadmin', [App\Http\Controllers\Auth\AdminLoginController::class, 'login']);
        // Admin password reset routes
        Route::get('siteadmin/forgot-password', [App\Http\Controllers\Auth\AdminForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
        Route::post('siteadmin/forgot-password', [App\Http\Controllers\Auth\AdminForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
        Route::get('siteadmin/reset-password/{token}', [App\Http\Controllers\Auth\AdminResetPasswordController::class, 'showResetForm'])->name('password.reset');
        Route::post('siteadmin/reset-password', [App\Http\Controllers\Auth\AdminResetPasswordController::class, 'reset'])->name('password.update');
    });
    Route::middleware('auth:admin')->group(function () {
        Route::get('dashboard', [App\Http\Controllers\AdminDashboardController::class, 'index'])->name('dashboard');
        Route::post('logout', [App\Http\Controllers\Auth\AdminLoginController::class, 'logout'])->name('logout');
    });
});
