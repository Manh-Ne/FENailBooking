<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;

// Home route
Route::get('/', function () {
    return view('welcome');
});

// Service routes
Route::prefix('services')->group(function () {
    Route::get('/', [ServiceController::class, 'index'])->name('services.index'); // List all services
    Route::post('/', [ServiceController::class, 'store'])->name('services.store'); // Store a new service
    Route::put('/{service}', [ServiceController::class, 'update'])->name('services.update'); // Update a service
    Route::delete('/{service}', [ServiceController::class, 'destroy'])->name('services.destroy'); // Delete a service
});