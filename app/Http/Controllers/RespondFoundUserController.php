<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Found;
use App\Models\Missing;
use App\Models\FoundResponses;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class RespondFoundUserController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('user.respond-found');
    }

    public function store(Request $request)
    {
        $validator= Validator::make($request->all(),[
            'relation' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'cricumstances ' => ['required', 'string'],
        ]);


        $found_response = new FoundResponses();
        $found_response->user_id=Auth::user()->id;
        $found_response->found_id =$request->found_id;
        $found_response->relation = $request->relation;
        $found_response->address = $request->address;
        $found_response->circumstances = $request->circumstances;
      
        $found_response->save();
        return redirect('user/home')->with('success', 'Thank you for responding! Your Responses has been saved.');
          
    
    }

    public function show($id)
    {
        $profile = Found::find($id);

        return view('user.respond-found', compact('profile'));
    }

}
