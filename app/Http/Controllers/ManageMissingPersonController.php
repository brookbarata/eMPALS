<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Missing;

class ManageMissingPersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['missing_report']= Missing::orderByDesc('created_at')
                                ->paginate(8);

        return view('admin.manage-mp-reports', $data);
    }


    public function update($id)
    {
        $missing_report=Missing::find($id);
        $missing_report->confirmed = 1;
        $missing_report->save();

        return redirect('admin/manage-mp-reports');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $missing_report = Missing::find($id);
        $missing_report->delete();
       return redirect('admin/manage-mp-reports')->with('success', 'Report Deleted Succesfully.');
    
    }
}
