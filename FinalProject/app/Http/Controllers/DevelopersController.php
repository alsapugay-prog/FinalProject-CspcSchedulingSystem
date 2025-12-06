<?php

namespace App\Http\Controllers;

class DevelopersController extends Controller
{
    public function index()
    {
        return view('developers'); // OR developers — depende sa filename mo
    }
}
