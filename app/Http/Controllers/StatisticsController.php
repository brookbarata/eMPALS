<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StatisticsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
     
    public function index()
    {
        return view('police_volunteer.statistics');
    }
    public function create()
    {
        return view('user.statistics');
    }

}
