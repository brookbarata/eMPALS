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

    public function add_police_volunteer(){
    
        return view('admin.add_police_volunteer');
    }

    public function manage_police_volunteer(){
    
        return view('admin.manage_police_volunteer');
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
    }
