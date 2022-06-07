<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function manage_users(){
        $data['users']= User::orderByDesc('created_at')
                             ->paginate(6);
        
    
        return view('admin.manage-users', $data);
    }


    public function index()
    {
        return view('user/home');
    }


    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
       return redirect('admin/manage-users')->with('success', 'User Deleted Succesfully.');
    }
}
