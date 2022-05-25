<?php

namespace App\Http\Controllers;

use App\Models\Missing;
use App\Models\InfoMissingDate;
use App\Models\Found;
use Illuminate\Http\Request;

class FilterOutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    { 

        return view('police_volunteer.filter-out');

     }

 
    public function create()
    {
        return view('user.filter-out');
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
        $data['filter_by']=$request->filter_by;


        if( $data['is_it']=='missing'){
            if( $data['filter_by']=='all'){

            $data['results']= Missing::where('fname','LIKE',"%{$data['fname']}%")
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
       elseif( $data['filter_by']=='lastname'){

            $data['results']= Missing::where('lname','LIKE',"%{$data['lname']}%")
                                      ->paginate(8);

          return view('police_volunteer.filter-out-result', $data);
        }

        elseif( $data['filter_by']=='age'){

            $data['results']= Missing::where('age','LIKE',"%{$data['age']}%")
                                      ->paginate(8);
                return view('police_volunteer.filter-out-result', $data);
               
            }

        elseif( $data['filter_by']=='fullname'){

            $data['results']= Missing::where('fname','LIKE',"%{$data['fname']}%")
                                        ->orWhere('mname','LIKE',"%{$data['mname']}%")
                                        ->orWhere('lname','LIKE',"%{$data['lname']}%")
                                        ->paginate(8);

          return view('police_volunteer.filter-out-result', $data);
        }
        elseif( $data['filter_by']=='cityorsubcity'){

            $data['results']= Missing::where('city','LIKE',"%{$data['city']}%")
                                        ->orWhere('sub_city','LIKE',"%{$data['sub_city']}%")
                                        ->paginate(8);

          return view('police_volunteer.filter-out-result', $data);
        }
        elseif( $data['filter_by']=='date'){

            $data['results']= Missing::where('created_at','LIKE',"%{$data['date']}%")
                                      ->paginate(8);

          return view('police_volunteer.filter-out-result', $data);
        }
        elseif( $data['filter_by']=='special_markings'){

            $data['results']= Missing::where('special_description','LIKE',"%{$data['special_desc']}%")
                                      ->paginate(8);
          return view('police_volunteer.filter-out-result', $data);
        }
    }
        else{
             if( $data['filter_by']=='all'){

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
       elseif( $data['filter_by']=='lastname'){

            $data['results']= Found::where('lname','LIKE',"%{$data['lname']}%")
                                      ->paginate(8);

          return view('police_volunteer.filter-out-result', $data);
        }

        elseif( $data['filter_by']=='age'){

            $data['results']= Found::where('age','LIKE',"%{$data['age']}%")
                                      ->paginate(8);

                return view('police_volunteer.filter-out-result', $data);
        }

        elseif( $data['filter_by']=='fullname'){

            $data['results']= Found::where('fname','LIKE',"%{$data['fname']}%")
                                        ->orWhere('mname','LIKE',"%{$data['mname']}%")
                                        ->orWhere('lname','LIKE',"%{$data['lname']}%")
                                        ->paginate(8);

          return view('police_volunteer.filter-out-result', $data);
        }
        elseif( $data['filter_by']=='cityorsubcity'){

            $data['results']= Found::where('city','LIKE',"%{$data['city']}%")
                                        ->orWhere('sub_city','LIKE',"%{$data['sub_city']}%")
                                        ->paginate(8);

          return view('police_volunteer.filter-out-result', $data);
        }
        elseif( $data['filter_by']=='date'){

            $data['results']= Found::where('created_at','LIKE',"%{$data['date']}%")
                                      ->paginate(8);

          return view('police_volunteer.filter-out-result', $data);
        }
        elseif( $data['filter_by']=='special_markings'){

            $data['results']= Found::where('special_description','LIKE',"%{$data['special_desc']}%")
                                      ->paginate(8);
          return view('police_volunteer.filter-out-result', $data);
        }
    }  
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
