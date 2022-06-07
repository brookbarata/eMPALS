<?php

namespace App\Http\Controllers;

use App\Models\InfoFoundDate;
use App\Models\Found;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class InfoFoundDateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function create()
    {
        return view('user/report-with-suggestion-found');

    }

    public function store(Request $request)
    {
      
       $validator= Validator::make($request->all(),[
            
           'date' => 'required|date|before:today',
            'city' => ['required', 'string', 'max:255'],
            'sub_city' => ['required', 'string', 'max:255'],
            'skin_color' => ['required', 'string'],
            'clothe' => 'required',
            'shoes' => ['required','string', 'max:255'],
        ]);
          

        if($validator->fails()){
              return redirect('user/report-with-suggestion-found')->with('danger', 'Error! Please Enter Valid Inputs.');

        }
else{
        $found = new Found();
        $found->user_id =Auth::user()->id;
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
            return redirect('user/home')->with('success', 'You have  added found person succesfully, It will be show in the Found person list after Validation!');
}
            
        }

}


