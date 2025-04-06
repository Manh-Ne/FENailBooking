<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StaffController;
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
// Product routes
Route::prefix('products')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('products.index'); // List all products
    Route::post('/', [ProductController::class, 'store'])->name('products.store'); // Store a new product
    Route::put('/{product}', [ProductController::class, 'update'])->name('products.update'); // Update an product
    Route::delete('/{product}', [ProductController::class, 'destroy'])->name('products.destroy'); // Delete an product
});
// Staff routes
Route::prefix('staffs')->group(function(){
    Route::get('/', [StaffController::class, 'index'])->name('staffs.index');
    Route::post('/', [StaffController::class, 'store'])->name('staffs.store');
    Route::put('/{staff}', [StaffController::class, 'update'])->name('staffs.update');
    Route::delete('/{staff}', [StaffController::class, 'destroy'])->name('staffs.destroy');
});
