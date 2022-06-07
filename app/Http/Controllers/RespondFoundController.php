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
    

    public function manageFoundResponses(){

        $data['responses']= FoundResponses::orderByDesc('created_at')
                                           ->paginate(6);

        return view('admin.manage-found-responses', $data);
    }

    public function index()
    {
        return view('police_volunteer.respond-found');
    }

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

    public function show($id)
    {
        $profile = Found::find($id);

        return view('police_volunteer.respond-found', compact('profile'));
    }

    public function destroy($id)
    {
        $user = FoundResponses::find($id);
        $user->delete();
       return redirect('admin/manage-found-responses')->with('success', 'Report Deleted Succesfully.');
   
    }
}
