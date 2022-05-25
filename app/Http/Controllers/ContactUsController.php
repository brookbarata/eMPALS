<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactUsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        return view('police_volunteer.contact-us');
    }
    public function create()
    {
        return view('user.contact-us');
    }
}
