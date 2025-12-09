<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\AdminRequest;

class RequestController extends Controller
{
    public function create()
    {
        
        return view('student.send_request');
    }

    public function store(Request $request)
    {
        AdminRequest::create([
            'user_id' => Auth::id(),
            'message' => $request->input('message'),
        ]);

       return back()->with('success', 'Request sent to admin!');
    }
}
