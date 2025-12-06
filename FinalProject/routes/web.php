<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;

// LOGIN ROUTES (public)
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.process');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// PUBLIC HOME (optional)
Route::get('/', function () {
    return redirect('/dashboard');
});

// PROTECTED ROUTES
Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('announcements', AnnouncementController::class);
    Route::resource('courses', CourseController::class);

    // STATIC DEVELOPERS PAGE (NO CONTROLLER)
    Route::view('/developers', 'developers')->name('developers.index');

    Route::resource('schedules', ScheduleController::class);

});
