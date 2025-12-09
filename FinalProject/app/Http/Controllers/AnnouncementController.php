<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcement; 

class AnnouncementController extends Controller
{
    public function index()
    {
        $announcements = Announcement::orderBy('created_at','desc')->get();
        $announcement = null; // for create mode
        return view('announcements.index', compact('announcements','announcement'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'body'  => 'required'
        ]);

        Announcement::create($request->only('title','body'));

        return redirect()->route('announcements.index')->with('success','Announcement created.');
    }

    public function edit(Announcement $announcement)
    {
        $announcements = Announcement::orderBy('created_at','desc')->get();
        return view('announcements.index', compact('announcement','announcements'));
    }

    public function update(Request $request, Announcement $announcement)
    {
        $request->validate([
            'title' => 'required|max:255',
            'body'  => 'required'
        ]);

        $announcement->update($request->only('title','body'));

        return redirect()->route('announcements.index')->with('success','Announcement updated.');
    }

    public function destroy(Announcement $announcement)
    {
        $announcement->delete();
        return redirect()->route('announcements.index')->with('success','Announcement deleted.');
    }
}