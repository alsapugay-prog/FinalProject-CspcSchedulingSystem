<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Announcement;
use App\Models\Schedule;
use App\Models\AdminRequest; // model for student requests
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    // ================================
    // GENERAL DASHBOARD (optional)
    // ================================
    public function index()
    {
        $courses_count = Course::count();
        $announcements = Announcement::latest()->get();
        $schedules = Schedule::all();

        return view('dashboard.index', compact(
            'courses_count',
            'announcements',
            'schedules'
        ));
    }

    // ================================
    // ADMIN DASHBOARD
    // ================================
    public function admin()
    {
        // middleware already checks role
        $courses_count = Course::count();
        $announcements_count = Announcement::count();
        $schedules_count = Schedule::count();

        // show student requests to admin
        $requests = AdminRequest::with('user')->latest()->get();

        return view('admin.dashboard', compact(
            'courses_count',
            'announcements_count',
            'schedules_count',
            'requests'
        ));
    }

    // ================================
    // STUDENT DASHBOARD
    // ================================
    public function student()
    {
        $announcements = Announcement::latest()->get();
        $schedules = Schedule::all();
        $courses_count = Course::count();

        return view('dashboard.index', compact(
            'announcements',
            'schedules',
            'courses_count'
        ));
    }

    // ================================
    // INSTRUCTOR DASHBOARD
    // ================================
    public function instructor()
    {
        $announcements = Announcement::latest()->get();
        $schedules = Schedule::all();
        $courses = Course::all();

        return view('instructor.dashboard', compact(
            'announcements',
            'schedules',
            'courses'
        ));
    }
}