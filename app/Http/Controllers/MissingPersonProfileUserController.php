<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Missing;
use App\Models\InfoMissingDate;
use Illuminate\Support\Facades\Validator;



class MissingPersonProfileUserController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){

        $data["search"]=$request->get('search');
       
        $query = Missing::where(function ($query) use ($data){
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
               
                
            $data["missing"] = $query->where('confirmed',"1")
                                        ->orderByDesc('created_at')
                                        ->paginate(8);

        return view('user.list-of-missing-person',$data);
     }


    public function show($id)
    {

        $profile = Missing::find($id);
        return view('user.missing-person-profile', compact('profile'));

    }


    public function edit($id)
    {
        $data['missing_report'] = Missing::find($id);
        return view('user.edit-missing-reports', $data);
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
            $missing_report->confirmed = 0;
        
            
            $fileName = time().$request->file('photo')->getClientOriginalName();
            $path = $request->file('photo')->storeAs('images', $fileName, 'public');

            $missing_report["photo"] = '/storage/'.$path;

            $missing_report->save();
           
            return redirect('user/my-reports')->with('success', 'Missing Person Edited Succesfully.');
    
    }
}

    public function destroy($id)
    {
        $missing_report = Missing::find($id);
        $missing_report->delete();
       return redirect('user/my-reports')->with('success', 'Report Deleted Succesfully.');
    }  
}
