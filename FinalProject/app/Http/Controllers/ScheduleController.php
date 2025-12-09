<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\Announcement;

class ScheduleController extends Controller
{
    public function index()
    {
        // Get schedules (no relationship needed because course_name is plain text)
        $schedules = Schedule::orderBy('day')
            ->orderBy('start_time')
            ->get();

        // Get announcements
        $announcements = Announcement::all();

        return view('schedules.index', compact('schedules', 'announcements'));
    }

    public function create()
    {
        // No courses needed anymore (typing mode)
        return view('schedules.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'day'         => 'required|string',
            'start_time'  => 'required',
            'end_time'    => 'required',
            'course_name' => 'nullable|string|max:255',
            'location'    => 'nullable|string|max:255',
        ]);

        Schedule::create([
            'day'         => $request->day,
            'start_time'  => $request->start_time,
            'end_time'    => $request->end_time,
            'course_name' => $request->course_name,
            'instructor_name'    => $request->instructor_name,
            'location'    => $request->location,
        ]);

        return redirect()->route('schedules.index')
            ->with('success', 'Schedule added.');
    }

    public function edit(Schedule $schedule)
    {
        // No courses needed anymore (typing mode)
        return view('schedules.edit', compact('schedule'));
    }

    public function update(Request $request, Schedule $schedule)
    {
        $request->validate([
            'day'         => 'required|string',
            'start_time'  => 'required',
            'end_time'    => 'required',
            'course_name' => 'nullable|string|max:255',
            'instructor_name' => 'nullable|string|max:255',
            'location'    => 'nullable|string|max:255',
        ]);

        $schedule->update([
            'day'         => $request->day,
            'start_time'  => $request->start_time,
            'end_time'    => $request->end_time,
            'course_name' => $request->course_name,
            'instructor_name' => $request->instructor_name,
            'location'    => $request->location,
        ]);

        return redirect()->route('schedules.index')
            ->with('success', 'Schedule updated.');
    }

    public function destroy(Schedule $schedule)
    {
        $schedule->delete();

        return redirect()->route('schedules.index')
            ->with('success', 'Schedule deleted.');
    }

    public function show(Schedule $schedule)
    {
        return view('schedules.show', compact('schedule'));
    }
}
