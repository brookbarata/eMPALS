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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
        //
    }
}
