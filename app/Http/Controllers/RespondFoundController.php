<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Found;
use App\Models\Missing;
use App\Models\FoundResponses;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class RespondFoundController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('police_volunteer.respond-found');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator= Validator::make($request->all(),[
            'relation' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'cricumstances ' => ['required', 'string'],
        ]);


        $found_response = new FoundResponses();
        $found_response->police_id=Auth::user()->id;
        $found_response->found_id =$request->found_id;
        $found_response->relation = $request->relation;
        $found_response->address = $request->address;
        $found_response->circumstances = $request->circumstances;
      
        $found_response->save();
        return redirect('police_volunteer/index')->with('success', 'Thank you for responding! Your Responses has been saved.');
          
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $profile = Found::find($id);

        return view('police_volunteer.respond-found', compact('profile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
