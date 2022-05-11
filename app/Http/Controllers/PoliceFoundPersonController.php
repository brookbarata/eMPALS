<?php

namespace App\Http\Controllers;

use App\Models\Found;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;

class PoliceFoundPersonController extends Controller
{
    //

  

    public function create(){
        
        return view('police_volunteer.report-found');
  
        
    }
     
     public function store(Request $request)
     {
         // $id=Auth::user()->id;
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
     
                $id=\DB::select("SHOW TABLE STATUS LIKE 'found_person'");
                $next_id=$id[0]->Auto_increment;
                \Session::put('found_id', $next_id);   

                $found = new Found();
                 $found->police_id = Auth::user()->id;
                 $found->fname = $request->fname;
                 $found->mname = $request->mname;
                 $found->lname = $request->lname;
                 $found->gender = $request->gender;
                 $found->age = $request->age;
                 $found->brith_place = $request->brith_place;
                 $found->nick_name = $request->nick_name;
                 $found->height = $request->height;
                 $found->weight = $request->weight;
                 $found->region = $request->region;
                 $found->city = $request->city;
                 $found->sub_city = $request->sub_city;
                 $found->street_name = $request->street_name;
                 $found->house_no = $request->house_no;
                 $found->special_description = $request->special_description;
                 $found->confirmed = 1;
             
                 
                 $fileName = time().$request->file('photo')->getClientOriginalName();
                 $path = $request->file('photo')->storeAs('images', $fileName, 'public');

                 $found["photo"] = '/storage/'.$path;

                 $found->save();
                
                 return redirect('police_volunteer/report-with-suggestion-found')->with('success', 'Reports Frist Part added, go ahead.');
         
     }
}
