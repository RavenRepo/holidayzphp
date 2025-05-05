<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PackageController;

Route::get('/', function () {
    return view('home');
});

Route::get('/packages', [PackageController::class, 'index'])->name('packages.index');

// UI Component Demo route
Route::view('/ui-demo', 'components.demo')->name('ui.demo');
Route::view('/ui-demo/carousel', 'components.ui.carousel.demo')->name('ui.demo.carousel');
