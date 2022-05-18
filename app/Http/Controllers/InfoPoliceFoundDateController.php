<?php

namespace App\Http\Controllers;

use App\Models\InfoFoundDate;
use App\Models\Found;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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
      
       $validator= Validator::make($request->all(),[
            
           'date' => 'required|date|before:tomorrow',
            'city' => ['required', 'string', 'max:255'],
            'sub_city' => ['required', 'string', 'max:255'],
            'skin_color' => ['required', 'string'],
            'clothe' => 'required',
            'shoes' => ['required','string', 'max:255'],
        ]);
          

        if($validator->fails()){
              return redirect('police_volunteer/report-with-suggestion-found')->with('danger', 'Error! Please Enter Valid Inputs.');

        }
else{
        $found = new Found();
        $found->police_id =Auth::user()->id;
        $found->fname =\Session::get('fname');
        $found->mname =\Session::get('mname');
        $found->lname =\Session::get('lname');
        $found->age =\Session::get('age');
        $found->brith_place =\Session::get('brith_place');
        $found->city =\Session::get('city');
        $found->sub_city =\Session::get('sub_city');
        $found->gender =\Session::get('gender');
        $found->nick_name =\Session::get('nick_name');
        $found->height =\Session::get('height');
        $found->weight =\Session::get('weight');
        $found->region =\Session::get('region');
        $found->street_name =\Session::get('street_name');
        $found->house_no =\Session::get('house_no');
        $found->special_description =\Session::get('special_description');
        $found->confirmed =1;
        $found->photo =\Session::get('photo');

        $found->save();

            $found_date = new InfoFoundDate();
            $found_date->found_id =\Session::get('found_id');
            $found_date->date = $request->date;
            $found_date->city = $request->city;
            $found_date->sub_city = $request->sub_city;
            $found_date->skin_color = $request->skin_color;
            $found_date->clothe = $request->clothe;
            $found_date->glass = $request->glass;
            $found_date->shoes = $request->shoes;
            $found_date->health_condition = $request->health_condition;
            $found_date->medical_problem = $request->medical_problem;
        
            $found_date->save();
            return redirect('police_volunteer/index')->with('success', 'You have  added found person succesfully');
}
            
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


