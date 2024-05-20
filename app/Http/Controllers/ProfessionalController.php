<?php

namespace App\Http\Controllers;

use App\Models\Professional;
use Illuminate\Http\Request;

class ProfessionalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $validateData = $request->validate([
            'company_name' => 'required|max:255',
            'role_title' => 'required|max:255',
            'company_location' => 'required|max:255',
            'company_description' => 'nullable',
            'start_month' => 'required|max:3',
            'start_year' => 'required|max:4',
            'end_month' => 'nullable|max:3',
            'end_year' => 'nullable|max:4',
            'currently_work' => 'nullable',
            'work_achievement' => 'required',
            'c_v_id' => 'required',
        ]);

        if (!($request->has('currently_work'))) {
            $validateData['currently_work'] = 0;
        } 

        $validateData['c_v_id'] = (int) $validateData['c_v_id'];
        $validateData['user_id'] = auth()->user()->id;

        Professional::create($validateData);

        return redirect('/cv/' . $validateData['c_v_id'] . "#professional")->with('success', 'Professional section has been saved!');
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
        $validatedData = $request->validate([
            'company_name' => 'required|max:255',
            'role_title' => 'required|max:255',
            'company_location' => 'required|max:255',
            'company_description' => 'nullable',
            'start_month' => 'required',
            'start_year' => 'required',
            'end_month' => 'nullable',
            'end_year' => 'nullable',
            'currently_work' => 'nullable',
            'work_achievement' => 'required',
            'c_v_id' => 'required',
        ]);

        if (!($request->has('currently_work'))) {
            $validatedData['currently_work'] = 0;
        } else {
            $validatedData['end_month'] = null;
            $validatedData['end_year'] = null;
        }
        
        $validatedData['c_v_id'] = (int) $validatedData['c_v_id'];

        Professional::where('id', $id)->update($validatedData);

        return redirect('/cv/' . $validatedData['c_v_id'] . '#professional')->with('success', 'Professional section has been saved!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Professional $professional
     * @return \Illuminate\Http\Response
     */
    public function destroy(Professional $professional)
    {
        $cv_id = $professional->c_v_id;

        Professional::destroy($professional->id);

        return redirect('/cv/' . $cv_id . '#professional')->with('success', 'Your professional experience has been removed!');
    }
}
