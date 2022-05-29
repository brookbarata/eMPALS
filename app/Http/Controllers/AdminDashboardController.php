<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Missing;
use App\Models\Found;
use App\Models\User;
use App\Models\PoliceVolunteer;



class AdminDashboardController extends Controller
{
    public function dashboard(){
        
        $count['user'] = User::count();
        $count['police'] = PoliceVolunteer::count();
        $count['missing'] = Missing::count();
        $count['found'] = Found::count();

        return view('admin.dashboard', $count);
  
     }
}
