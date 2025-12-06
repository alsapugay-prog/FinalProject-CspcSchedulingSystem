<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Announcement;
use App\Models\Schedule;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $courses_count = Course::count();
        $announcements_count = Announcement::count();
        $schedules_count = Schedule::count();

        // For "upcoming classes today" you'd need to compare day and time; here's a simple count
        return view('dashboard.index', compact('courses_count','announcements_count','schedules_count'));
    }
}
