<?php

namespace App\Http\Controllers;

use App\Models\Missing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;

class MissingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    

    public function manage_mp_reports(){
        return view('admin.manage_mp_reports');
     }

     public function validate_mp_pending(){
        return view('admin.validate_mp_pending');
     }


    public function index()
    {
        return view('missing.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $id=Auth::user()->id;
//  $validateData = 
      $request->validate([
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

            
             // $missingPerson = auth()->user()->missingPerson()->latest();
            //   $missingPerson->infoMissingDate()->create($validateData);
    
                $id=\DB::select("SHOW TABLE STATUS LIKE 'missing_person'");
                $next_id=$id[0]->Auto_increment;
                \Session::put('missing_id', $next_id);   


                $missing = new Missing();
                $missing->user_id = Auth::user()->id;
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
             
                $missing->save();
                // $id=DB::select("SHOW TABLE STATUS LIKE 'missing_person'");
                // $next_id=$id[0]->Auto_increment;
                // Session::put('missing_id', $$next_id);
                return redirect('report-with-suggestion')->with('success', 'You have added Frist part Of Missing Person Report');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Missing  $missing
     * @return \Illuminate\Http\Response
     */
    public function show(Missing $missing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Missing  $missing
     * @return \Illuminate\Http\Response
     */
    public function edit(Missing $missing)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Missing  $missing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Missing $missing)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Missing  $missing
     * @return \Illuminate\Http\Response
     */
    public function destroy(Missing $missing)
    {
        //
    }
}
