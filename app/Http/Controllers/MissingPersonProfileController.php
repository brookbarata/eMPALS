<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Missing;
use App\Models\InfoMissingDate;



class MissingPersonProfileController extends Controller
{
    
    public function index(){

        $missing = Missing::paginate(8);
        return view('police_volunteer.list-of-missing-person')->with('missing', $missing);
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

         $profile = Missing::find($id);

        return view('police_volunteer.missing-person-profile', compact('profile'));
    }

    public function edit($id)
    {
        $data['missing_report'] = Missing::find($id);
        return view('police_volunteer.edit-missing-reports', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id'=>'max:255',
            'fname' => ['required', 'string', 'max:255'],
            'mname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string'],
            'age' => 'required',
            'brith_place' => ['string', 'max:255'],
            'nick_name' => ['string', 'max:255'],
            'height' => 'required',
            'weight' => 'required',
            'region' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'sub_city' => ['required', 'string', 'max:255'],
            'street_name' => ['required', 'string', 'max:255'],
            'house_no' => ['required', 'string', 'max:255'],
            'special_description' => ['required', 'string', 'max:255'],
        ]);

            $missing_report=Missing::find($id);
            $missing_report->fname = $request->fname;
            $missing_report->mname = $request->mname;
            $missing_report->lname = $request->lname;
            $missing_report->gender = $request->gender;
            $missing_report->age = $request->age;
            $missing_report->brith_place = $request->brith_place;
            $missing_report->nick_name = $request->nick_name;
            $missing_report->height = $request->height;
            $missing_report->weight = $request->weight;
            $missing_report->region = $request->region;
            $missing_report->city = $request->city;
            $missing_report->sub_city = $request->sub_city;
            $missing_report->street_name = $request->street_name;
            $missing_report->house_no = $request->house_no;
            $missing_report->special_description = $request->special_description;
            $missing_report->confirmed = 1;
        
            
            $fileName = time().$request->file('photo')->getClientOriginalName();
            $path = $request->file('photo')->storeAs('images', $fileName, 'public');

            $missing_report["photo"] = '/storage/'.$path;

            $missing_report->save();
           
            return redirect('police_volunteer/my-reports')->with('success', 'Missing Person Edited Succesfully.');
    
    }

    public function destroy($id)
    {
        $missing_report = Missing::find($id);
        $missing_report->delete();
       return redirect('police_volunteer/my-reports')->with('success', 'Report Deleted Succesfully.');
    }  
}
