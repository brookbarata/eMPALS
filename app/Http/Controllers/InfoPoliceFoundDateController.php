<?php

namespace App\Http\Controllers;

use App\Models\InfoFoundDate;
use Illuminate\Http\Request;

class InfoPoliceFoundDateController extends Controller
{
    
    public function index(){


    }
    public function create()
    {
        return view('police_volunteer/report-with-suggestion-found');

    }

    public function store(Request $request)
    {
      
        $request->validate([
            
            'date' => ['required', 'date'],
            'city' => ['required', 'string', 'max:255'],
            'sub_city' => ['required', 'string', 'max:255'],
            'skin_color' => ['required', 'string'],
            'clothe' => 'required',
            'shoes' => ['required','string', 'max:255'],
        ]);
          

            $found = new InfoFoundDate();
            $found->found_id =\Session::get('found_id');
            $found->date = $request->date;
            $found->city = $request->city;
            $found->sub_city = $request->sub_city;
            $found->skin_color = $request->skin_color;
            $found->clothe = $request->clothe;
            $found->glass = $request->glass;
            $found->shoes = $request->shoes;
            $found->health_condition = $request->health_condition;
            $found->medical_problem = $request->medical_problem;
        
            $found->save();
            return redirect('police_volunteer/index')->with('success', 'You have  added found person succesfully');

            
        }

        /**
         * Display the specified resource.
         *
         * @param  \App\Models\InfoFoundDate  $infoFoundDate
         * @return \Illuminate\Http\Response
         */
        public function show(InfoFoundDate $infoFoundDate)
        {
            //
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param  \App\Models\InfoFoundDate  $infoFoundDate
         * @return \Illuminate\Http\Response
         */
        public function edit(InfoFoundDate $infoFoundDate)
        {
            //
        }

        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  \App\Models\InfoFoundDate  $infoMissingDate
         * @return \Illuminate\Http\Response
         */
        public function update(Request $request, InfoFoundDate $infoFoundDate)
        {
            //
        }

        /**
        * Remove the specified resource from storage.
        *
        * @param  \App\Models\InfoFoundDate  $infoFoundDate
        * @return \Illuminate\Http\Response
        */
        public function destroy(InfoFoundDate $infoFoundDate)
        {
            //
        }
}


