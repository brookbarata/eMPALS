<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Found;

class ManageFoundPersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

        public function index()
        {
            $data['found_report']= Found::orderByDesc('created_at')
                                ->paginate(8);

            return view('admin.manage_fp_reports', $data);
        }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $found_report=Found::find($id);
        $found_report->confirmed = 1;
        $found_report->save();
        
        return redirect('admin/dashboard')->with('success', 'Report Validated Succesfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $found_report = Found::find($id);
        $found_report->delete();
       return redirect('admin/dashboard')->with('success', 'Report Deleted Succesfully.');
    
    }
}
