<?php

namespace App\Http\Controllers;

use App\Models\Missing;
use App\Models\Found;
use Illuminate\Http\Request;

class FilterOutController extends Controller
{
   
    public function index()
    {
        return view('police_volunteer.filter-out');
    }

 
    public function create()
    {
        //
    }

  
    public function store(Request $request)
    {
        $data['fname']=$request->fname;
        $data['mname']=$request->mname;
        $data['lname']=$request->lname;
        $data['date']=$request->date;
        $data['city']=$request->city;
        $data['sub_city']=$request->sub_city;
        $data['is_it']=$request->is_it;
        $data['special_desc']=$request->special_desc;
        $data['age']=$request->age;

        if( $data['is_it']=='missing'){

            $data['results']= Missing::where('fname','LIKE',"[%{$data['fname']}%, NULL]")
                                       ->where('mname','LIKE',"%{$data['mname']}%")
                                      ->where('lname','LIKE',"%{$data['lname']}%")
                                      ->where('age','LIKE',"%{$data['age']}%")
                                      ->where('created_at','LIKE',"%{$data['date']}%")
                                      ->where('city','LIKE',"%{$data['city']}%")
                                      ->where('sub_city','LIKE',"%{$data['sub_city']}%")
                                      ->where('special_description','LIKE',"%{$data['special_desc']}%")
                                      ->paginate(8);

          return view('police_volunteer.filter-out-result', $data);
        }
        else{
            $data['results']= Found::where('fname','LIKE',"%{$data['fname']}%")
                                    ->where('mname','LIKE',"%{$data['mname']}%")
                                    ->where('lname','LIKE',"%{$data['lname']}%")
                                    ->where('age','LIKE',"%{$data['age']}%")
                                    ->where('created_at','LIKE',"%{$data['date']}%")
                                    ->where('city','LIKE',"%{$data['city']}%")
                                    ->where('sub_city','LIKE',"%{$data['sub_city']}%")
                                    ->where('special_description','LIKE',"%{$data['special_desc']}%")
                                    ->paginate(8);

            return view('police_volunteer.filter-out-result', $data);
    }
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
        //
    }

    public function destroy($id)
    {
        //
    }
}
