<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

class DashboardController extends Controller
{
   public function dashboard(){
        
      return view('police_volunteer.dashboard');

   }
   public function index(){
        
      return view('police_volunteer.index');

   }
}
