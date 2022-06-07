<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InfoMissingDate;
use App\Models\Missing;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;



class InfoMissingDateController extends Controller
{
  
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function create()
    {
        return view('user/report-with-suggestion');
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
            // 'medical_problem' => 'string',
        ]);

        if($validator->fails()){
            return redirect('user/report-with-suggestion')->with('danger', 'Error! Please Enter Valid Inputs.');

      }

        $missing = new Missing();
        $missing->user_id =Auth::user()->id;
        $missing->fname =\Session::get('_fname');
        $missing->mname =\Session::get('_mname');
        $missing->lname =\Session::get('_lname');
        $missing->age =\Session::get('_age');
        $missing->brith_place =\Session::get('_brith_place');
        $missing->city =\Session::get('_city');
        $missing->sub_city =\Session::get('_sub_city');
        $missing->gender =\Session::get('_gender');
        $missing->nick_name =\Session::get('_nick_name');
        $missing->height =\Session::get('_height');
        $missing->weight =\Session::get('_weight');
        $missing->region =\Session::get('_region');
        $missing->street_name =\Session::get('_street_name');
        $missing->house_no =\Session::get('_house_no');
        $missing->special_description =\Session::get('_special_description');
        $missing->photo =\Session::get('_photo');

        $missing->save();

            $missing_date = new InfoMissingDate();
            $missing_date->missing_id =\Session::get('missing_id');
            $missing_date->date = $request->date;
            $missing_date->city = $request->city;
            $missing_date->sub_city = $request->sub_city;
            $missing_date->skin_color = $request->skin_color;
            $missing_date->clothe = $request->clothe;
            $missing_date->glass = $request->glass;
            $missing_date->shoes = $request->shoes;
            $missing_date->health_condition = $request->health_condition;
            $missing_date->medical_problem = $request->medical_problem;
        
            $missing_date->save();
            return redirect('user/home')->with('success', 'You have  added missing person succesfully, It will be show in the missing person list after Validation!');
            }

}



