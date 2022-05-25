<?php

namespace App\Http\Controllers;

use App\Models\InfoMissingDate;
use App\Models\Missing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class InfoMissingDateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        return view('missing.report-with-suggestion');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     *
     */

    // public function report_with_suggestion(){
        
    //     return view('police_volunteer.report-with-suggestion');
  
    //  }

    public function create()
    {
        // return view('missing.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
        $request->validate([
            
            'date' => 'required|date|before:tomorrow',
            'city' => ['required', 'string', 'max:255'],
            'sub_city' => ['required', 'string', 'max:255'],
            'skin_color' => ['required', 'string'],
            'clothe' => 'required',
            'shoes' => ['required','string', 'max:255'],
            'health_condition' => 'required',
            // 'medical_problem' => 'string',
        ]);

        
        
        $missing = new Missing();
        $missing->fname =\Session::get('fname');
        $missing->mname =\Session::get('mname');
        $missing->lname =\Session::get('lname');
        $missing->age =\Session::get('age');
        $missing->brith_place =\Session::get('brith_place');
        $missing->city =\Session::get('city');
        $missing->sub_city =\Session::get('sub_city');
        $missing->gender =\Session::get('gender');
        $missing->nick_name =\Session::get('nick_name');
        $missing->height =\Session::get('height');
        $missing->weight =\Session::get('weight');
        $missing->region =\Session::get('region');
        $missing->street_name =\Session::get('street_name');
        $missing->house_no =\Session::get('house_no');
        $missing->special_description =\Session::get('special_description');
        $missing->photo =\Session::get('photo');

        $missing->save();         

            $missing_date = new InfoMissingDate();
            $missing_date->missing_id =\Session::get('missing_id');
            $missing_date->date = $request->date;
            $missing_date->city = \Session::get('city');
            $missing_date->sub_city = $request->sub_city;
            $missing_date->skin_color = $request->skin_color;
            $missing_date->clothe = $request->clothe;
            $missing_date->glass = $request->glass;
            $missing_date->shoes = $request->shoes;
            $missing_date->health_condition = $request->health_condition;
            $missing_date->medical_problem = $request->medical_problem;
        
            $missing_date->save();
            return redirect('/home')->with('success', 'You have  added missing person succesfully');
    
        
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
