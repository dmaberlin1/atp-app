<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\BusController;
use App\Http\Controllers\DriverApplicationController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\SettingController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('brands', BrandController::class)->middleware(['auth', 'can:admin-or-manager']);
Route::resource('drivers', DriverController::class)->middleware(['auth', 'can:admin-or-manager']);
Route::resource('buses', BusController::class)->middleware(['auth', 'can:admin-or-manager']);
Route::get('/former-drivers', [\App\Http\Controllers\FormerDriverController::class, 'index'])->name('former_drivers.index');

Route::get('/apply-driver', [DriverApplicationController::class, 'create'])->name('driver-application.create');
Route::post('/apply-driver', [DriverApplicationController::class, 'store'])->name('driver-application.store');




Route::middleware(['auth'])->group(function () {
    Route::get('/settings', [SettingController::class, 'edit'])->name('settings.edit');
    Route::put('/settings', [SettingController::class, 'update'])->name('settings.update');
});

Route::middleware(['auth', 'role:manager,admin'])->group(function () {
    Route::get('/applications', [DriverApplicationController::class, 'index'])->name('applications.index');
});
