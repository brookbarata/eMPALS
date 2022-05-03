<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Missing;

class AdminDashboardController extends Controller
{
    public function dashboard(){
        
        return view('admin.dashboard');
  
     }

    //  public function index(){
    //      $mp = Missing::with('info_missing_date')->first();
    //      dd($mp->toArray());
    //  }
}
