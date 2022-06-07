<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Mail\Mailer;
use Mail;
use App\Models\PoliceVolunteer;
use App\Models\Missing;
use App\Models\Found;


 
use App\Mail\NotifyViaMail;
 
 


class MailSecondController extends Controller
{

    public function update(Request $request, $id)
    {
        $mp=Missing::find($id);

        $mailData = [
           "fname" =>$mp->fname,
           "mname" =>$mp->mname,
           "person"=>"Missing",
           "link" => "http://127.0.0.1:8080/police_volunteer/list-of-missing-person/$id"
       ];
       $police_volunteers = PoliceVolunteer::where('region','=', $mp->region)
                              ->pluck('email')
                              ->toArray();
       foreach ($police_volunteers as $recipient) {
          Mail::to($recipient)->send(new NotifyViaMail($mailData));             
          }

        $mp->notified = 1;
        $mp->save();

        return redirect('admin/manage-mp-reports');
  
    }

 
}
