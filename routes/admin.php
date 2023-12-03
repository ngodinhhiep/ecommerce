<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\AdminProfileController;

/* Admin Routes */
Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');


/* Profile Routes */
Route::get('profile', [AdminProfileController::class, 'index'])->name('profile');
Route::post('profile/update', [AdminProfileController::class, 'updateProfile'])->name('profile.update');
Route::post('profile/update/password', [AdminProfileController::class, 'updatePassword'])->name('password.update');


/* Slider Route */
Route::resource('slider', SliderController::class);

/* Category Route */
Route::resource('category', CategoryController::class);
?>