<?php

namespace App\Http\Controllers;

use App\Models\Missing;
use App\Models\Found;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class MyReportsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    

    public function index()
    {
        $data['missing_report']= Missing::where('police_id', Auth::user()->id)
                                       ->orderByDesc('created_at')
                                        ->get();
                           

        $data['found_report']= Found::where('police_id', '=', Auth::user()->id)
                             ->orderByDesc('created_at')
                             ->get();

        return view('police_volunteer.my-reports', $data);
    }

    public function create()
    {
        $data['missing_report']= Missing::where('user_id', Auth::user()->id)
        ->get();

        $data['found_report']= Found::where('user_id', '=', Auth::user()->id)
                ->get();

        return view('user.my-reports', $data);
    }
}
