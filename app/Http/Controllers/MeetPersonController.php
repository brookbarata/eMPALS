<?php

namespace App\Http\Controllers;

use App\Models\MeetPerson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class MeetPersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function manage_meet_persons(){
        return view('admin.manage_meet_persons');
     }


    public function index()
    {
        //
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
     * @param  \App\Models\MeetPerson  $meetPerson
     * @return \Illuminate\Http\Response
     */
    public function show(MeetPerson $meetPerson)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MeetPerson  $meetPerson
     * @return \Illuminate\Http\Response
     */
    public function edit(MeetPerson $meetPerson)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MeetPerson  $meetPerson
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MeetPerson $meetPerson)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MeetPerson  $meetPerson
     * @return \Illuminate\Http\Response
     */
    public function destroy(MeetPerson $meetPerson)
    {
        //
    }
}
