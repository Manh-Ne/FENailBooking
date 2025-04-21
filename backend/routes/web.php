<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\CustomerController;
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
Route::prefix('staff')->group(function(){
    Route::get('/', [StaffController::class, 'index'])->name('staff.index');
    Route::post('/', [StaffController::class, 'store'])->name('staff.store');
    Route::put('/{staff}', [StaffController::class, 'update'])->name('staff.update');
    Route::delete('/{staff}', [StaffController::class, 'destroy'])->name('staff.destroy');
});
// Customer routes
Route::prefix('customers')->group(function(){
    Route::get('/', [CustomerController::class, 'index'])->name('customers.index');
    Route::post('/', [CustomerController::class, 'store'])->name('customers.store');
    Route::put('/{customer}', [CustomerController::class, 'update'])->name('customers.update');
    Route::delete('/{customer}', [CustomerController::class, 'destroy'])->name('customers.destroy');
});
