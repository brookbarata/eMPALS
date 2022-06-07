<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Missing;
use App\Models\MissingResponses;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class RespondMissingUserController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('user.respond-missing');
    }



    public function store(Request $request)
    {
        $validator= Validator::make($request->all(),[
            'relation' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'cricumstances ' => ['required', 'string'],
        ]);


        $missing_response = new MissingResponses();
        $missing_response->user_id=Auth::user()->id;
        $missing_response->missing_id =$request->missing_id;
        $missing_response->relation = $request->relation;
        $missing_response->address = $request->address;
        $missing_response->circumstances = $request->circumstances;
      
        $missing_response->save();
        return redirect('user/home')->with('success', 'Thank you for responding! Your Responses has been saved.');
          
      }    


    public function show($id)
    {
        $profile = Missing::find($id);

        return view('user.respond-missing', compact('profile'));
    }

}
