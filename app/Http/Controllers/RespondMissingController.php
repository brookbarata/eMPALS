<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Missing;
use App\Models\MissingResponses;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class RespondMissingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('police_volunteer.respond-missing');
    }



    public function manageMissingResponses(){

        $data['responses']= MissingResponses::orderByDesc('created_at')
                                            ->paginate(6);
    
        return view('admin.manage-missing-responses', $data);
    }


    public function store(Request $request)
    {
        $validator= Validator::make($request->all(),[
            'relation' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'cricumstances ' => ['required', 'string'],
        ]);


        $missing_response = new MissingResponses();
        $missing_response->police_id=Auth::user()->id;
        $missing_response->missing_id =$request->missing_id;
        $missing_response->relation = $request->relation;
        $missing_response->address = $request->address;
        $missing_response->circumstances = $request->circumstances;
      
        $missing_response->save();
        return redirect('police_volunteer/index')->with('success', 'Thank you for responding! Your Responses has been saved.');
          
      }    


    public function show($id)
    {
        $profile = Missing::find($id);

        return view('police_volunteer.respond-missing', compact('profile'));
    }


    public function destroy($id)
    {
        $user = MissingResponses::find($id);
        $user->delete();
       return redirect('admin/manage-missing-responses')->with('success', 'Report Deleted Succesfully.');
   
    }
}
