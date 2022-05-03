<?php

namespace App\Http\Controllers;

use App\Models\Found;
use Illuminate\Http\Request;

class FoundController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    

     public function manage_fp_reports(){
        return view('admin.manage_fp_reports');
     }

     public function validate_fp_pending(){
        return view('admin.validate_fp_pending');
     }


    public function index()
    {
        return view('found.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Found  $found
     * @return \Illuminate\Http\Response
     */
    public function show(Found $found)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Found  $found
     * @return \Illuminate\Http\Response
     */
    public function edit(Found $found)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Found  $found
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Found $found)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Found  $found
     * @return \Illuminate\Http\Response
     */
    public function destroy(Found $found)
    {
        //
    }
}
