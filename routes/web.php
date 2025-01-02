<?php

use Illuminate\Support\Facades\Route;

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // Dashboard route
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Fallback route for unknown routes
Route::fallback(function () {
    // Check if the user is authenticated
    if (auth()) {
        // Redirect to the dashboard if authenticated
        return redirect()->route('dashboard');
    }

    // Otherwise, redirect to the login page or another route
    return redirect()->route('login');
});