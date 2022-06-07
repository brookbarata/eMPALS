<?php

namespace App\Http\Controllers;

use App\Models\Missing;
use App\Models\Found;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class PoliceMissingPersonController extends Controller
{

    public function create()
    {
        return view('police_volunteer.report-missing');

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
           return redirect('police_volunteer/report-missing', )->with('danger', 'Error! Please Enter Some Valid Inputs.');
     }
     else{

           $id=\DB::select("SHOW TABLE STATUS LIKE 'missing_person'");
           $next_id=$id[0]->Auto_increment;
           \Session::put('missing_id', $next_id);   

           \Session::put('_mname', $request->mname);   
           \Session::put('_lname', $request->lname);   
           \Session::put('_age', $request->age);   
           \Session::put('_gender', $request->gender);   
           \Session::put('_brith_place', $request->brith_place);   
           \Session::put('_nick_name', $request->nick_name);   
           \Session::put('_height', $request->height);   
           \Session::put('_weight', $request->weight);   
           \Session::put('_region', $request->region);   
           \Session::put('_city', $request->city);   
           \Session::put('_sub_city', $request->sub_city);  
           \Session::put('_street_name', $request->street_name);   
           \Session::put('_house_no', $request->house_no);   
           \Session::put('_special_description', $request->special_description);   
           \Session::put('_fname', $request->fname);   

          $fileName = time().$request->file('photo')->getClientOriginalName();
          $path = $request->file('photo')->storeAs('images', $fileName, 'public');


          \Session::put('_photo','/storage/'.$path);   
          
         
            $data['results']= Found::where('fname','LIKE',"%{$request->fname}%")
                                           ->where('mname','LIKE',"%{$request->mname}%")
                                           ->where('lname','LIKE',"%{$request->lname}%")
                                           ->where('age','LIKE',"%{$request->age}%")
                                           ->orWhere('city','LIKE',"%{$request->city}%")
                                           ->orWhere('sub_city','LIKE',"%{$request->sub_city}%")
                                           ->orWhere('special_description','LIKE',"%{$request->special_description}%")
                                           ->get();
                            

                if($data['results']->isNotEmpty()){
                   return view('police_volunteer/suggestions/suggestions-missing', $data)->with('success', 'Reports Frist Part added, go ahead.');
                }
               else{
                   return view('police_volunteer/report-with-suggestion')->with('error', 'Noops, You does not have any suggestions!');
               }
    
}
    }
}
