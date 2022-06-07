<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Mail\Mailer;
use Mail;
use App\Models\User;
use App\Models\PoliceVolunteer;
use App\Models\Missing;
use App\Models\Found;


 
use App\Mail\NotifyViaMail;
 
 
class MailController extends Controller
{ 
    
    public function update($id)
    {
      
        $fp=Found::find($id);

        $mailData = [
            "fname" =>$fp->fname,
            "mname" =>$fp->mname,
            "person"=> "Found",
            "link" => "http://127.0.0.1:8080/police_volunteer/list-of-found-person/$id"
       ];
       $police_volunteers = PoliceVolunteer::where('region','=', $fp->region)
                                ->pluck('email')
                                ->toArray();
       foreach ($police_volunteers as $recipient) {
          Mail::to($recipient)->send(new NotifyViaMail($mailData));             
          }
  
          $fp->notified = 1;
          $fp->save();
  
          return redirect('admin/manage-fp-reports');

    }


}
