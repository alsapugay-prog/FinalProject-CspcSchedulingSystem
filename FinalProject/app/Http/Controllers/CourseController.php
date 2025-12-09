<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::orderBy('subject')->get();
        return view('courses.index', compact('courses'));
    }

    public function create()
    {
        return view('courses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'subject'=>'required|max:255',
            'professor'=>'required|max:255',
            'schedule'=>'required|max:255',
        ]);

        Course::create($request->only('subject','professor','schedule'));

        return redirect()->route('courses.index')->with('success','Course added.');
    }

    public function edit(Course $course)
    {
        return view('courses.edit', compact('course'));
    }

    public function update(Request $request, Course $course)
    {
        $request->validate([
            'subject'=>'required|max:255',
            'professor'=>'required|max:255',
            'schedule'=>'required|max:255',
        ]);

        $course->update($request->only('subject','professor','schedule'));

        return redirect()->route('courses.index')->with('success','Course updated.');
    }

    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('courses.index')->with('success','Course deleted.');
    }

    public function show(Course $course)
    {
        return view('courses.show', compact('course'));
    }
 
}
