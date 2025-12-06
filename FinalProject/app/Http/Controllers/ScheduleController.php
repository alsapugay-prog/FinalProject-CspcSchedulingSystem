<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\Course;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = Schedule::with('course')->orderBy('day')->orderBy('start_time')->get();
        return view('schedules.index', compact('schedules'));
    }

    public function create()
    {
        $courses = Course::orderBy('subject')->get();
        return view('schedules.create', compact('courses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'day'=>'required|string',
            'start_time'=>'required',
            'end_time'=>'required',
            'course_id'=>'nullable|exists:courses,id',
            'location'=>'nullable|string|max:255',
        ]);

        Schedule::create($request->only('day','start_time','end_time','course_id','location'));

        return redirect()->route('schedules.index')->with('success','Schedule added.');
    }

    public function edit(Schedule $schedule)
    {
        $courses = Course::orderBy('subject')->get();
        return view('schedules.edit', compact('schedule','courses'));
    }

    public function update(Request $request, Schedule $schedule)
    {
        $request->validate([
            'day'=>'required|string',
            'start_time'=>'required',
            'end_time'=>'required',
            'course_id'=>'nullable|exists:courses,id',
            'location'=>'nullable|string|max:255',
        ]);

        $schedule->update($request->only('day','start_time','end_time','course_id','location'));

        return redirect()->route('schedules.index')->with('success','Schedule updated.');
    }

    public function destroy(Schedule $schedule)
    {
        $schedule->delete();
        return redirect()->route('schedules.index')->with('success','Schedule deleted.');
    }

    public function show(Schedule $schedule)
    {
        return view('schedules.show', compact('schedule'));
    }
}
