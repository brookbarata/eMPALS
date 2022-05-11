<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FilterOutController extends Controller
{
    
    public function index(){

        return view('police_volunteer.filter-out');
     }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
 return 1;

    }

    public function show($id)
    {

    }
}