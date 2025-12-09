<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RequestController;

// ==========================
// LOGIN ROUTES (public)
// ==========================
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.process');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// ==========================
// DEFAULT HOME REDIRECT
// ==========================
Route::get('/', function () {
    return redirect('/dashboard');
});

// ==========================
// PROTECTED ROUTES
// ==========================
Route::middleware(['auth'])->group(function () {

    // ==========================
    // UNIVERSAL DASHBOARD
    // ==========================
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    // ==========================
    // DEVELOPERS PAGE
    // ==========================
    Route::get('/developers', function () {
        if (!in_array(auth()->user()->role, ['admin', 'student', 'instructor'])) {
            abort(403);
        }

        return view('developers');
    })->name('developers.index');

    // ==========================
    // ADMIN ROUTES
    // ==========================
    Route::get('/admin', function () {
        if (auth()->user()->role !== 'admin') {
            abort(403);
        }

        return app(DashboardController::class)->admin();
    })->name('admin.dashboard');

    Route::resource('announcements', AnnouncementController::class);
    Route::resource('courses', CourseController::class);
    Route::resource('schedules', ScheduleController::class);

    // ==========================
    // STUDENT ROUTES
    // ==========================
    Route::get('/student', function () {
        if (auth()->user()->role !== 'student') {
            abort(403);
        }

        return app(DashboardController::class)->student();
    })->name('student.dashboard');

    // ✅ FIXED REQUEST ROUTES
    Route::get('/request', [RequestController::class, 'create'])
        ->name('request.create');

    Route::post('/request', [RequestController::class, 'store'])
        ->name('request.store');

    // ==========================
    // INSTRUCTOR ROUTES
    // ==========================
    Route::get('/instructor', function () {
        if (auth()->user()->role !== 'instructor') {
            abort(403);
        }

        return app(DashboardController::class)->instructor();
    })->name('instructor.dashboard');
});
