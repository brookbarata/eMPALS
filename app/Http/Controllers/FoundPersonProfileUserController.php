<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Found;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;




class FoundPersonProfileUserController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){

        $data["search"]=$request->get('search');
        $query = Found::where(function ($query) use ($data){
            $query->where('fname', 'like', '%'.$data['search'].'%'); 
            $query->orWhere('mname', 'like', '%'.$data['search'].'%');              
            $query->orWhere('lname', 'like', '%'.$data['search'].'%') ;   
            $query->orWhere('city', 'like', '%'.$data['search'].'%') ;             
            $query->orWhere('sub_city', 'like', '%'.$data['search'].'%');  
            $query->orWhere('region', 'like', '%'.$data['search'].'%');                              
            $query->orWhere('nick_name', 'like', '%'.$data['search'].'%');  
            $query->orWhere('brith_place', 'like', '%'.$data['search'].'%'); 
            $query->orWhere('age', '=', $data['search']); 
            $query->orWhere('street_name', 'like', '%'.$data['search'].'%'); 
            $query->orWhere('special_description', 'like', '%'.$data['search'].'%');
              });
   
    
         $data["found"] = $query->where('confirmed',"1")
                                    ->orderByDesc('created_at')
                                    ->paginate(8);

        return view('user.list-of-found-person', $data);
     }

   
    public function show($id )
    {
        $profile=Found::find($id);
        return view('user.found-person-profile', compact('profile'));
    }

   
    public function edit($id)
    {

        $data['found_report'] = Found::find($id);
        return view('user.edit-found-reports', $data);
    }

    public function update(Request $request, $id)
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
        ]);

        if($validator->fails()){
            return back()->with('danger', 'Error! Please Enter Some Valid Inputs.');
      }
      else{
            $found_report=Found::find($id);
            $found_report->fname = $request->fname;
            $found_report->mname = $request->mname;
            $found_report->lname = $request->lname;
            $found_report->gender = $request->gender;
            $found_report->age = $request->age;
            $found_report->brith_place = $request->brith_place;
            $found_report->nick_name = $request->nick_name;
            $found_report->height = $request->height;
            $found_report->weight = $request->weight;
            $found_report->region = $request->region;
            $found_report->city = $request->city;
            $found_report->sub_city = $request->sub_city;
            $found_report->street_name = $request->street_name;
            $found_report->house_no = $request->house_no;
            $found_report->special_description = $request->special_description;
            $found_report->confirmed = 0;
        
            
            $fileName = time().$request->file('photo')->getClientOriginalName();
            $path = $request->file('photo')->storeAs('images', $fileName, 'public');

            $found_report["photo"] = '/storage/'.$path;

            $found_report->save();
           
            return redirect('user/my-reports')->with('success', 'Found Person Edited Succesfully.');
      }
    }

    public function destroy($id)
    {
        $found_report = Found::find($id);
        $found_report->delete();
       return redirect('user/my-reports')->with('success', 'Report Deleted Succesfully.');
    }
}
