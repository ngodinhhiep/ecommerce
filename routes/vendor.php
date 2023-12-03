<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\VendorController;
use App\Http\Controllers\Backend\VendorProfileController;


/* Vendor Routes */
Route::get('dashboard', [VendorController::class, 'dashboard'])->name('dashboard');
Route::get('profile', [VendorProfileController::class, 'index'])->name('profile');
Route::post('profile/update', [VendorProfileController::class, 'updateProfile'])->name('profile.update');
Route::post('profile/password/update', [VendorProfileController::class, 'updatePassword'])->name('profile.update.password');
?>