<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\NotifyViaMail;

class MailController extends Controller
{
   public function sendMail(){
      
    Mail::to("fake@email.com")->send(new NotifyViaMail());

       return view('police_volunteer.index');
   }
}
