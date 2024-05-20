<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Education;

class EducationController extends Controller
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
            'school_name' => 'required|max:255',
            'school_location' => 'required|max:255',
            'education_start_month' => 'required|max:3',
            'education_start_year' => 'required|max:4',
            'education_end_month' => 'nullable|max:3',
            'education_end_year' => 'nullable|max:4',
            'education_level' => 'required|max:255',
            'education_description' => 'required',
            'gpa' => 'required|max:6',
            'max_gpa' => 'required|max:6',
            'education_achievment' => 'required',
            'c_v_id' => 'required',
        ]);

        $validateData['c_v_id'] = (int) $validateData['c_v_id'];
        $validateData['user_id'] = auth()->user()->id;

        Education::create($validateData);
        return redirect('/cv/' . $validateData['c_v_id'] . "#education")->with('success', 'Education section has been saved!');

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
        $validateData = $request->validate([
            'school_name' => 'required|max:255',
            'school_location' => 'required|max:255',
            'education_start_month' => 'required|max:3',
            'education_start_year' => 'required|max:4',
            'education_end_month' => 'nullable|max:3',
            'education_end_year' => 'nullable|max:4',
            'education_level' => 'required|max:255',
            'education_description' => 'required',
            'gpa' => 'required|max:6',
            'max_gpa' => 'required|max:6',
            'education_achievment' => 'required',
            'c_v_id' => 'required',
        ]);

        $validateData['c_v_id'] = (int) $validateData['c_v_id'];

        Education::where('id', $id)->update($validateData);

        return redirect('/cv/' . $validateData['c_v_id'] . '#education')->with('success', 'Education section has been saved!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Education $education
     * @return \Illuminate\Http\Response
     */
    public function destroy(Education $education)
    {
        $cv_id = $education->c_v_id;

        Education::destroy($education->id);

        return redirect('/cv/' . $cv_id . '#education')->with('success', 'Your education level has been removed!');
    }
}
