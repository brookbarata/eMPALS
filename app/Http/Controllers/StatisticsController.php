<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Missing;
use App\Models\Found;
use App\Models\User;
use App\Models\PoliceVolunteer;


class StatisticsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
     
    public function index()
    {
        $count['user'] = User::count();
        $count['police'] = PoliceVolunteer::count();
        $count['missing'] = Missing::count();
        $count['found'] = Found::count();

        return view('police_volunteer.statistics',$count);
    }
    public function create()
    {
        $count['user'] = User::count();
        $count['police'] = PoliceVolunteer::count();
        $count['missing'] = Missing::count();
        $count['found'] = Found::count();

        return view('user.statistics',$count);
    }

}
