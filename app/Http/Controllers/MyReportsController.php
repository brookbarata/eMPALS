<?php

namespace App\Http\Controllers;

use App\Models\Missing;
use App\Models\Found;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class MyReportsController extends Controller
{
    public function index()
    {
        $data['missing_report']= Missing::where('police_id', Auth::user()->id)
                            ->get();
                           

        $data['found_report']= Found::where('police_id', '=', Auth::user()->id)
                            ->get();

        return view('police_volunteer.my-reports', $data);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
       
    }

    public function update(Request $request, $id)
    {
        //
    }

   

    public function destroy($id)
    {
      
    }
}
