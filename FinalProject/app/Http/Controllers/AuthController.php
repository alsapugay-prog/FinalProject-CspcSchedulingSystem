<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
{
    $credentials = $request->only('email', 'password');

    if (!Auth::attempt($credentials)) {
        return back()->with('error', 'Invalid credentials');
    }

    $user = Auth::user();

    if ($user->role === 'admin') {
        return redirect('/admin/dashboard');
    }

    if ($user->role === 'instructor') {
        return redirect('/instructor/dashboard');
    }

    if ($user->role === 'student') {
        return redirect('/student/dashboard');
    }

    return redirect('/');
}

}
