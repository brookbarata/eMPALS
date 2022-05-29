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
    
 public function index(){
      $mailData = [
                "name" => "Hello Everyone How was everything!",
                "dob" => "12/12/1990"
            ];
            $police_volunteers = PoliceVolunteer::pluck('email')->toArray();
            foreach ($police_volunteers as $recipient) {
               Mail::to($recipient)->send(new NotifyViaMail($mailData));             
               }
               return redirect('admin/dashboard')->with('success', 'Nearby Police Officers and Volunteers Notified!');
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
        
      
 

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { 
        
    }

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
  

     return redirect('admin/dashboard')->with('success', 'Nearby Police Officers and Volunteers Notified!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = PoliceVolunteer::find($id);
        $user->delete();
       return redirect('admin/dashboard')->with('success', 'Report Deleted Succesfully.');
    }
}
