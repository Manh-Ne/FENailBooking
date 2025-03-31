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
// Item routes
Route::prefix('items')->group(function () {
    Route::get('/', [ItemController::class, 'index'])->name('items.index'); // List all items
    Route::post('/', [ItemController::class, 'store'])->name('items.store'); // Store a new item
    Route::put('/{item}', [ItemController::class, 'update'])->name('items.update'); // Update an item
    Route::delete('/{item}', [ItemController::class, 'destroy'])->name('items.destroy'); // Delete an item
});
