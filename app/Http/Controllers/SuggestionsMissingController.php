<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuggestionsMissingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('police_volunteer.suggestions-missing');
    }
    public function create()
    {
        return view('user.suggestions-missing');
    }
}
