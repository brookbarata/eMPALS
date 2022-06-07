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

            return view('admin.manage-fp-reports', $data);
        }
    


    public function update(Request $request, $id)
    {
        $found_report=Found::find($id);
        $found_report->confirmed = 1;
        $found_report->save();
        
        return redirect('admin/manage-fp-reports');

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
       return redirect('admin/manage-fp-reports')->with('success', 'Report Deleted Succesfully.');
    
    }
}
