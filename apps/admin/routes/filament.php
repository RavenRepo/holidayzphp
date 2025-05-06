<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['web', 'auth:admin']], function () {
    Route::get('/admin', function () {
        return view('filament.dashboard');
    })->name('filament.dashboard');
});
