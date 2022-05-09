<?php

namespace App\Http\Controllers;

use App\Models\InfoMissingDate;
use Illuminate\Http\Request;

class InfoPoliceMissingDateController extends Controller
{
    

    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('police_volunteer/report-with-suggestion');

    }

    // public function report_with_suggestion(){
        
    //     return view('police_volunteer/report-with-suggestion');
  
    //  }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
        $request->validate([
            
            'date' => ['required', 'date'],
            'city' => ['required', 'string', 'max:255'],
            'sub_city' => ['required', 'string', 'max:255'],
            'skin_color' => ['required', 'string'],
            'clothe' => 'required',
            'shoes' => ['required','string', 'max:255'],
            // 'medical_problem' => 'string',
        ]);

    

            $missing = new InfoMissingDate();
            $missing->missing_id =\Session::get('missing_id');
            $missing->date = $request->date;
            $missing->city = $request->city;
            $missing->sub_city = $request->sub_city;
            $missing->skin_color = $request->skin_color;
            $missing->clothe = $request->clothe;
            $missing->glass = $request->glass;
            $missing->shoes = $request->shoes;
            $missing->health_condition = $request->health_condition;
            $missing->medical_problem = $request->medical_problem;
        
            $missing->save();
            return redirect('police_volunteer/index')->with('success', 'You have  added missing person succesfully');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InfoMissingDate  $infoMissingDate
     * @return \Illuminate\Http\Response
     */
    public function show(InfoMissingDate $infoMissingDate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InfoMissingDate  $infoMissingDate
     * @return \Illuminate\Http\Response
     */
    public function edit(InfoMissingDate $infoMissingDate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\InfoMissingDate  $infoMissingDate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InfoMissingDate $infoMissingDate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InfoMissingDate  $infoMissingDate
     * @return \Illuminate\Http\Response
     */
    public function destroy(InfoMissingDate $infoMissingDate)
    {
        //
    }
}


