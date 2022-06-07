<?php

namespace App\Http\Controllers;

use App\Models\Missing;
use App\Models\InfoMissingDate;
use App\Models\Found;
use Illuminate\Http\Request;

class FilterOutUserController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth');
  }

    public function index()
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
                                      ->where('confirmed',"1")
                                      ->orderByDesc('created_at')
                                      ->paginate(8);

          return view('user.filter-out-result-missing', $data);
        }
       elseif( $data['filter_by']=='lastname'){

            $data['results']= Missing::where('lname','LIKE',"%{$data['lname']}%")
                                        ->where('confirmed',"1")
                                        ->orderByDesc('created_at')
                                        ->paginate(8);

          return view('user.filter-out-result-missing', $data);
        }

        elseif( $data['filter_by']=='age'){

            $data['results']= Missing::where('age','LIKE',"%{$data['age']}%")
                                      ->where('confirmed',"1")
                                      ->orderByDesc('created_at')
                                      ->paginate(8);

                return view('user.filter-out-result-missing', $data);
               
            }

        elseif( $data['filter_by']=='fullname'){

            $data['results']= Missing::where('fname','LIKE',"%{$data['fname']}%")
                                        ->orWhere('mname','LIKE',"%{$data['mname']}%")
                                        ->orWhere('lname','LIKE',"%{$data['lname']}%")
                                        ->where('confirmed',"1")
                                        ->orderByDesc('created_at')
                                        ->paginate(8);

          return view('user.filter-out-result-missing', $data);
        }
        elseif( $data['filter_by']=='cityorsubcity'){

            $data['results']= Missing::where('city','LIKE',"%{$data['city']}%")
                                        ->orWhere('sub_city','LIKE',"%{$data['sub_city']}%")
                                        ->where('confirmed',"1")
                                        ->orderByDesc('created_at')
                                        ->paginate(8);

          return view('user.filter-out-result-missing', $data);
        }
        elseif( $data['filter_by']=='date'){

            $data['results']= Missing::where('created_at','LIKE',"%{$data['date']}%")
                                      ->where('confirmed',"1")
                                      ->orderByDesc('created_at')
                                      ->paginate(8);

          return view('user.filter-out-result-missing', $data);
        }
        elseif( $data['filter_by']=='special_markings'){

            $data['results']= Missing::where('special_description','LIKE',"%{$data['special_desc']}%")
                                      ->where('confirmed',"1")
                                      ->orderByDesc('created_at')
                                      ->paginate(8);
          return view('user.filter-out-result-missing', $data);
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
                                      ->where('confirmed',"1")
                                      ->orderByDesc('created_at')
                                      ->paginate(8);
                                      
          return view('user.filter-out-result-found', $data);
        }
       elseif( $data['filter_by']=='lastname'){

            $data['results']= Found::where('lname','LIKE',"%{$data['lname']}%")
                                      ->where('confirmed',"1")
                                      ->orderByDesc('created_at')
                                      ->paginate(8);

          return view('user.filter-out-result-found', $data);
        }

        elseif( $data['filter_by']=='age'){

            $data['results']= Found::where('age','LIKE',"%{$data['age']}%")
                                      ->where('confirmed',"1")
                                      ->orderByDesc('created_at')
                                      ->paginate(8);

                return view('user.filter-out-result-found', $data);
        }

        elseif( $data['filter_by']=='fullname'){

            $data['results']= Found::where('fname','LIKE',"%{$data['fname']}%")
                                        ->where('mname','LIKE',"%{$data['mname']}%")
                                        ->where('lname','LIKE',"%{$data['lname']}%")
                                        ->where('confirmed',"1")
                                        ->orderByDesc('created_at')
                                        ->paginate(8);

          return view('user.filter-out-result-found', $data);
        }
        elseif( $data['filter_by']=='cityorsubcity'){

            $data['results']= Found::where('city','LIKE',"%{$data['city']}%")
                                        ->where('sub_city','LIKE',"%{$data['sub_city']}%")
                                        ->where('confirmed',"1")
                                        ->orderByDesc('created_at')
                                        ->paginate(8);

          return view('user.filter-out-result-found', $data);
        }
        elseif( $data['filter_by']=='date'){

            $data['results']= Found::where('created_at','LIKE',"%{$data['date']}%")
                                    ->where('confirmed',"1")
                                    ->orderByDesc('created_at')                        
                                    ->paginate(8);

          return view('user.filter-out-result-found', $data);
        }
        elseif( $data['filter_by']=='special_markings'){

            $data['results']= Found::where('special_description','LIKE',"%{$data['special_desc']}%")
                                      ->where('confirmed',"1")
                                      ->orderByDesc('created_at')
                                      ->paginate(8);
          return view('user.filter-out-result-found', $data);
        }
    } 
    }

}
