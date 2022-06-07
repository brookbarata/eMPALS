<?php

namespace App\Http\Controllers;

use App\Models\Found;
use App\Models\Missing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class PoliceFoundPersonController extends Controller
{
    

    public function create(){
        
        return view('police_volunteer.report-found');
    }
     
     public function store(Request $request)
     {
         $validator= Validator::make($request->all(),[
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
                 'photo' => 'required',
             ]);
     

             if($validator->fails()){
                return redirect('police_volunteer/report-found')->with('danger', 'Error! Please Enter Some Valid Inputs.');
  
          }
          else{

                $id=\DB::select("SHOW TABLE STATUS LIKE 'found_person'");
                $next_id=$id[0]->Auto_increment;
                \Session::put('found_id', $next_id);   
                 

                \Session::put('fname', $request->fname);   
                \Session::put('mname', $request->mname);   
                \Session::put('lname', $request->lname);   
                \Session::put('age', $request->age);   
                \Session::put('gender', $request->gender);   
                \Session::put('brith_place', $request->brith_place);   
                \Session::put('nick_name', $request->nick_name);   
                \Session::put('height', $request->height);   
                \Session::put('weight', $request->weight);   
                \Session::put('region', $request->region);   
                \Session::put('city', $request->city);   
                \Session::put('sub_city', $request->sub_city);  
                \Session::put('street_name', $request->street_name);   
                \Session::put('house_no', $request->house_no);   
                \Session::put('special_description', $request->special_description);   
 
                $fileName = time().$request->file('photo')->getClientOriginalName();
                $path = $request->file('photo')->storeAs('images', $fileName, 'public');
 
 
                \Session::put('photo','/storage/'.$path);   
                
               
                  $data['results']= Missing::where('fname','LIKE',"%{$request->fname}%")
                                            ->where('mname','LIKE',"%{$request->mname}%")
                                            ->where('lname','LIKE',"%{$request->lname}%")
                                            ->where('age','LIKE',"%{$request->age}%")
                                            ->orWhere('city','LIKE',"%{$request->city}%")
                                            ->orWhere('sub_city','LIKE',"%{$request->sub_city}%")
                                            ->orWhere('special_description','LIKE',"%{$request->special_description}%")
                                            ->get();
 
                  if($data['results']->isNotEmpty()){
                    return view('police_volunteer/suggestions/suggestions-found', $data)->with('success', 'Reports Frist Part added, go ahead.');
                 }
                else{
                    return view('police_volunteer/report-with-suggestion-found')->with('error', 'Noops, You does not have any suggestions!');
                }
     }
    }
}
