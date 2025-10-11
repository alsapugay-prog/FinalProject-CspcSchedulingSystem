<?php

use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/classes', function () {
    return view('classes');
});

Route::get('/schedules', function () {
    return view('schedules');
});

Route::get('/announcements', function () {
    return view('announcements');
});

Route::get('/profile', function () {
    return view('profile');
});

// Optional: redirect home to dashboard
Route::get('/', function () {
    return redirect('/dashboard');
});
