<?php

namespace App\Http\Controllers;

use App\Models\Missing;
use App\Models\Found;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;

class PoliceMissingPersonController extends Controller
{
    //

    public function create(){
        
        return view('police_volunteer.report-missing');
  
     }

     
     public function store(Request $request)
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
     
                $id=\DB::select("SHOW TABLE STATUS LIKE 'missing_person'");
                $next_id=$id[0]->Auto_increment;
                \Session::put('missing_id', $next_id);   

                
                 $missing = new Missing();
                 $missing->police_id = Auth::user()->id;
                 $missing->fname = $request->fname;
                 $missing->mname = $request->mname;
                 $missing->lname = $request->lname;
                 $missing->gender = $request->gender;
                 $missing->age = $request->age;
                 $missing->brith_place = $request->brith_place;
                 $missing->nick_name = $request->nick_name;
                 $missing->height = $request->height;
                 $missing->weight = $request->weight;
                 $missing->region = $request->region;
                 $missing->city = $request->city;
                 $missing->sub_city = $request->sub_city;
                 $missing->street_name = $request->street_name;
                 $missing->house_no = $request->house_no;
                 $missing->special_description = $request->special_description;
                 $missing->confirmed = 1;

                 $fileName = time().$request->file('photo')->getClientOriginalName();
                 $path = $request->file('photo')->storeAs('images', $fileName, 'public');

                 $missing["photo"] = '/storage/'.$path;





                 


                 $missing->save();
                 return redirect('police_volunteer/report-with-suggestion')->with('success', 'Reports Frist Part added, go ahead.');
         
     }
}
