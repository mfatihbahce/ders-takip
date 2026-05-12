<?php

use App\Http\Controllers\Admin\ApplicationController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SchoolClassController;
use App\Http\Controllers\Admin\SiteSettingController;
use App\Http\Controllers\PublicApplicationController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicApplicationController::class, 'create'])->name('form.create');
Route::post('/basvuru', [PublicApplicationController::class, 'store'])->name('form.store');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

    Route::middleware('admin')->group(function () {
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/basvurular', [ApplicationController::class, 'index'])->name('applications.index');
        Route::get('/siniflar', [SchoolClassController::class, 'index'])->name('classes.index');
        Route::post('/siniflar', [SchoolClassController::class, 'store'])->name('classes.store');
        Route::get('/profil', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('/profil', [ProfileController::class, 'update'])->name('profile.update');
        Route::get('/site-ayarlari', [SiteSettingController::class, 'edit'])->name('settings.edit');
        Route::put('/site-ayarlari', [SiteSettingController::class, 'update'])->name('settings.update');
    });
});
