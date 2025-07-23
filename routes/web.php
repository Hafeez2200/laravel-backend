<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TextController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\LanguageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AdminController::class, 'dashboard'])->middleware('auth');

Route::get('/dashboard', [AdminController::class, 'dashboard'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::resource('images', \App\Http\Controllers\Admin\ImageController::class)->names('admin.images');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
    Route::get('/admin/logs/{user}', [AdminController::class, 'logs'])->name('admin.logs');

    Route::resource('/admin/texts', TextController::class);
    Route::resource('/admin/settings', SettingController::class);
    
    // languages
    Route::resource('/admin/languages', LanguageController::class)->only(['index', 'create', 'store', 'destroy']);
    Route::resource('/admin/cities', \App\Http\Controllers\Admin\CityController::class)->names('admin.cities');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/admin/users/{id}/ban', [AdminController::class, 'toggleBan'])->name('admin.users.ban');
    
});

require __DIR__.'/auth.php';
