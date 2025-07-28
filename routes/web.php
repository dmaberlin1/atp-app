<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\BusController;
use App\Http\Controllers\DriverController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('brands', BrandController::class)->middleware(['auth', 'can:admin-or-manager']);
Route::resource('drivers', DriverController::class)->middleware(['auth', 'can:admin-or-manager']);
Route::resource('buses', BusController::class)->middleware(['auth', 'can:admin-or-manager']);
