<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AdminLoginController;

// TEST ROUTE: Should appear at /test-route
Route::get('/test-route', function () {
    return 'Test route works!';
});

// Include authentication routes
require __DIR__.'/auth.php';

// Guest routes
Route::middleware('guest')->group(function () {
    Route::get('/', function () {
        return redirect('/admin');
    });
});

// Redirect dashboard to Filament admin panel
Route::get('/dashboard', function () {
    return redirect('/admin');
})->name('dashboard');

// Filament specific routes
Route::middleware('auth:admin')->group(function () {
    Route::post('admin/logout', [AdminLoginController::class, 'logout'])->name('filament.admin.auth.logout');
});
