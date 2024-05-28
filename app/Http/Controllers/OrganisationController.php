<?php

namespace App\Http\Controllers;

use App\Models\Organisation;
use Illuminate\Http\Request;

class OrganisationController extends Controller
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
            'organisation_name' => 'required|max:255',
            'position_title' => 'required|max:255',
            'organisation_description' => 'nullable',
            'organisation_location' => 'required|max:255',
            'organisation_start_month' => 'required',
            'organisation_start_year' => 'required',
            'organisation_end_month' => 'nullable',
            'organisation_end_year' => 'nullable',
            'currently_active' => 'nullable',
            'role_description' => 'required',
            'c_v_id' => 'required',
        ]);

        if (!($request->has('currently_active'))) {
            $validateData['currently_active'] = 0;
        } 

        $validateData['c_v_id'] = (int) $validateData['c_v_id'];
        $validateData['user_id'] = auth()->user()->id;

        Organisation::create($validateData);

        return redirect('/cv/' . $validateData['c_v_id'] . "#organisation")->with('success', 'Organisation section has been saved!');
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
            'organisation_name' => 'required|max:255',
            'position_title' => 'required|max:255',
            'organisation_description' => 'nullable',
            'organisation_location' => 'required|max:255',
            'organisation_start_month' => 'required',
            'organisation_start_year' => 'required',
            'organisation_end_month' => 'nullable',
            'organisation_end_year' => 'nullable',
            'currently_active' => 'nullable',
            'role_description' => 'required',
            'c_v_id' => 'required',
        ]);
        
        if (!($request->has('currently_active'))) {
            $validatedData['currently_active'] = 0;
        } else {
            $validatedData['organisation_end_month'] = null;
            $validatedData['organisation_end_year'] = null;
        }
        
        $validatedData['c_v_id'] = (int) $validatedData['c_v_id'];

        Organisation::where('id', $id)->update($validatedData);

        return redirect('/cv/' . $validatedData['c_v_id'] . '#organisation')->with('success', 'Organisation section has been saved!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Organisation $organisation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Organisation $organisation)
    {
        $cv_id = $organisation->c_v_id;

        Organisation::destroy($organisation->id);

        return redirect('/cv/' . $cv_id . '#organisation')->with('success', 'Your organisation experience has been removed!');
    }
}
