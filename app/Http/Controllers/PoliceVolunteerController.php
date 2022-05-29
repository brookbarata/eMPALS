<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use App\Models\PoliceVolunteer;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;


use Validator, Auth;

class PoliceVolunteerController extends Controller
{
    public function authenticate(Request $request) {

        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::guard('police_volunteer')->attempt(['email' => $request->email, 'password' => $request->password],$request->get('remember'))) {
            return redirect()->route('police_volunteer.index');
        }
         else {
            session()->flash('error','Either Email/Password is incorrect');
            return back()->withInput($request->only('email'));
             }
    }

    public function logout() {
        Auth::guard('police_volunteer')->logout();
        return redirect()->route('police_volunteer.login');
    }

    public function addPoliceVolunteer(){
    
        return view('admin.add_police_volunteer');
    }

    public function managePoliceVolunteer(){
        $data['users']= PoliceVolunteer::orderByDesc('created_at')
                                         ->paginate(6);
       
    
        return view('admin.manage_police_volunteer',$data);
    }

    public function index(){
        return view('police_volunteer.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:police_volunteers' ],
            'phone_number' => ['required', 'max:255', 'unique:police_volunteers'],
            'region' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'sub_city' => ['required', 'string', 'max:255'],
            'police_station' => ['required', 'string', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $police_volunteer = PoliceVolunteer::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'region' => $request->region,
            'city' => $request->city,
            'sub_city' => $request->sub_city,
            'police_station' => $request->police_station,
            'password' => Hash::make($request->password),
        ]);

            return redirect('admin/dashboard')->with('success', 'New Police Volunteer added Succesfully');
           
    }
 
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
          }


    public function destroy($id)
    {
        $user = PoliceVolunteer::find($id);
        $user->delete();
       return redirect('admin/dashboard')->with('success', 'Report Deleted Succesfully.');
   
    }
}
