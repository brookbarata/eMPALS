<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuggestionsFoundController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('police_volunteer.suggestions.suggestions-found');
    }
    public function create()
    {
        return view('user.suggestions.suggestions-found');
    }
}
